<?php

/*mainPage/index => mainPage - controller, index - method*/

return [
    '' => 'mainPage/index', // главная страница
    'login' => 'auth/index', // страница авторизации
    'logout' => 'auth/logout', // выход
    'registration' => 'register/index', // страница регистрации
    'login/put' => 'auth/checkUser', // авторизация (бд)
    'registration/put' => 'register/createUser', // регистрация (бд)
    'admin' => 'admin/index', // главная страница админки

    'admin/category/delete/(\\d+)' => 'admin/deleteCategory/$1', // удаление категории
    'admin/category/edit/(\\d+)' => 'admin/viewEditCategory/$1', // страница редактирования категории
    'admin/category/add' => 'admin/viewAddCategory', // страница добавления категории

    'admin/edit_cat/(\\d+)' => 'admin/editCategory/$1', // редактировани категории (бд)
    'admin/add_cat' => 'admin/addCategory', // добавление категории (бд)

    'admin/product/delete/(\\d+)' => 'admin/deleteProduct/$1',
    'admin/product/edit/(\\d+)' => 'admin/viewEditProduct/$1',
    'admin/product/add' => 'admin/viewAddProduct',

    'admin/edit_prod/(\\d+)' => 'admin/editProduct/$1',
    'admin/add_prod' => 'admin/addProduct',

    //api
    'api/categories/(\\d+)/(\\d+)' => 'api/getProduct/$1/$2', // получение данных о продукте по id категории и id продукта
    'api/categories/([\\w ]+)/([\\w ]+)' => 'api/getProduct/$1/$2', // получение данных о продукте по названию категории и названию продукта
    'api/categories/(\\d+)' => 'api/getProducts/$1', // получение продуктов категории (по id)
    'api/categories/([\\w ]+)' => 'api/getProducts/$1', // получение продуктов категории (по названию категории)
    'api/categories' => 'api/getCategories', // получение категорий


];
