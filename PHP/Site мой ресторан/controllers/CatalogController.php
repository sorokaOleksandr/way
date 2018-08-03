<?php


class CatalogController{

    public function actionCategory($categoryId){


        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId);

        require_once (ROOT.'/views/catalog/index.php');

        return true;
    }

    public static function actionPage($pageId){

        $categories = array();
        $categories = Category::getCategoriesList();

        $pageProducts = array();
        $pageProducts = Product::getPageProduct($pageId);

        require_once (ROOT.'/views/catalog/page.php');

        return true;

    }

}