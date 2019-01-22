<?php

interface IModel
{
    public function get($parameters, $id); // получение данных
    public function put($parameters); // запись данных
    public function update($parameters); // обновление данных
    public function delete($id); // удаление данных
}