<?php

include_once ROOT.'/models/Product.php';
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/CategoryProduct.php';
include_once ROOT.'/components/Validator.php';

class AdminController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function actionIndex() // отображение главной страницы админки
    {
        $categories = new Category($this->db);
        $categories = $categories->get();

        $products = new Product($this->db);
        $products = $products->get();

        require_once(ROOT . '/views/admin/index.php');
        Session::delete('error_msg');
        return true;
    }

    public function actionViewAddCategory()
    {
        $path = '/admin/add_cat/';
        require_once(ROOT . '/views/admin/category/form.php');
        return true;
    }

    public function actionAddCategory()
    {
        $check = Validator::validateProduct(['name' => $_POST['name']]);

        if ($check == 'success') {
            $category = new Category($this->db);
            if ($category->put([$_POST['name']])) {

            } else {
                Session::set('error_msg', 'This category is already exists!');
            }
        } else {
            Session::set('error_msg', $check);
        }

        header('Location: http://localhost:8080/admin');
        return true;
    }

    public function actionViewEditCategory($id)
    {
        $category = new Category($this->db);
        $category = $category->get([], $id)[0];
        $path = '/admin/edit_cat/'.$category['id'].'/';

        require_once(ROOT . '/views/admin/category/form.php');
        return true;
    }

    public function actionEditCategory($id)
    {
        $check = Validator::validateProduct(['name' => $_POST['name']]);

        if ($check == 'success') {
            $category= new Category($this->db);
            if ($category->update([$id, $_POST['name']])) {

            } else {
                Session::set('error_msg', 'This category is already exists!');
            }
        } else {
            Session::set('error_msg', $check);
        }

        header('Location: http://localhost:8080/admin');
        return true;
    }

    public function actionDeleteCategory($id)
    {
        $category = new Category($this->db);
        $category->delete($id);
        header('Location: http://localhost:8080/admin');
        return true;
    }

    public function actionViewAddProduct()
    {
        $categories = new Category($this->db);
        $categories = $categories->get();
        $path = '/admin/add_prod/';

        require_once(ROOT . '/views/admin/product/form.php');
        return true;
    }


    public function actionAddProduct()
    {
        $check = Validator::validateProduct(['name' => $_POST['name'], 'description' => $_POST['description'], 'price' => $_POST['price'], 'count' => $_POST['count']]);

        if ($check == 'success') {
            $product = new Product($this->db);
            if ($product->put([$_POST['name'], $_POST['description'], $_POST['price'], $_POST['count']])) { // создание продукта

                $category_product = new CategoryProduct($this->db);
                if ($category_product->put([$_POST['category']])) { // связь продукта и категории

                } else {
                    Session::set('error_msg', 'Error!');
                }

            } else {
                Session::set('error_msg', 'This product is already exists!');
            }
        } else {
            Session::set('error_msg', $check);
        }

        header('Location: http://localhost:8080/admin');
        return true;
    }

    public function actionViewEditProduct($id)
    {
        $product = new Product($this->db);
        $product = $product->get([], $id)[0];
        $categories = new Category($this->db);
        $categories = $categories->get();
        $path = '/admin/edit_prod/'.$product['id'].'/';

        require_once(ROOT . '/views/admin/product/form.php');
        return true;
    }

    public function actionEditProduct($id)
    {
        $check = Validator::validateProduct(['name' => $_POST['name'], 'description' => $_POST['description'], 'price' => $_POST['price'], 'count' => $_POST['count']]);

        if ($check == 'success') {
            $product = new Product($this->db);
            if ($product->update([$id, $_POST['name'], $_POST['description'], $_POST['price'], $_POST['count']])) {

                $category_product = new CategoryProduct($this->db);
                if ($category_product->update([$_POST['category'], $_POST['prod_id']])) {

                } else {
                    Session::set('error_msg', 'Error!');
                }

            } else {
                Session::set('error_msg', 'This product is already exists!');
            }
        } else {
            Session::set('error_msg', $check);
        }

        header('Location: http://localhost:8080/admin');
        return true;
    }

    public function actionDeleteProduct($id)
    {
        $product = new Product($this->db);
        $product->delete($id);
        header('Location: http://localhost:8080/admin');
        return true;
    }
}