<?php

class Router
{
	private $routes;
	private $db;

	public function __construct($db)
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath); //список роутов
        $this->db = $db; //получение связи с БД
	}


	private function getURI()  //получение URI
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		    return urldecode(trim($_SERVER['REQUEST_URI'], '/'));
		} else {
		    return null;
        }
	}

	private function checkAuth($uri) //проверка на авторизацию
    {
        if ($uri == 'admin') {
            if (!Session::has('auth') && !Session::get('auth') == true)
                header('Location: http://localhost:8080/login');
        } elseif ($uri == 'login' || $uri == 'registration') {
            if (Session::has('auth') && Session::get('auth') == true)
                header('Location: http://localhost:8080/admin');
        }
    }

	public function run() //запуск роута
	{
		$uri = $this->getURI();
		$check = false;

		$this->checkAuth($uri);

		foreach ($this->routes as $uriPattern => $path) {

			if (preg_match("~^$uriPattern$~ui", $uri)) {

/*				echo "<br>Где ищем (запрос, который набрал пользователь): ".$uri;
				echo "<br>Что ищем (совпадение из правила): ".$uriPattern;
				echo "<br>Кто обрабатывает: ".$path; */

				// Получаем внутренний путь из внешнего согласно правилу.

				$internalRoute = preg_replace("~^$uriPattern$~ui", $path, $uri);

/*				echo '<br>Нужно сформулировать: '.$internalRoute.'<br>'; */

				$segments = explode('/', $internalRoute);

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName); // формирование имени контроллера

				$actionName = 'action'.ucfirst(array_shift($segments)); // формирование имени метода

				$parameters = $segments;

				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}

				$controllerObject = new $controllerName($this->db);

				$result = call_user_func_array(array($controllerObject, $actionName), $parameters); // вызов метода с передаными параметрами в контроллере
				
				if ($result != null) {
				    $check = true;
					break;
				}
			}

		}

		if ($check == false) { // если маршрут не найден
            include_once(ROOT . '/controllers/ErrorsController.php');
            $controllerObject = new ErrorsController();
            $controllerObject->actionNotFound();
        }
	}
}