<?php

class Product{

    public static function getProductsListByCategory($categoryId = false)
    {

        if($categoryId){

            $db = Db::getConnection();

            $products = array();
            $result = $db->query("SELECT * FROM product WHERE category_id = '$categoryId' ORDER BY id DESC");




            $i = 0;
            while ($row = $result->fetch())
            {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['brand'] = $row['brand'];

                $i++;
            }

            return $products;
        }


    }



    public static function getPageProduct($pageId = false){


        if($pageId){

            $db = Db::getConnection();

            $products = array();
            $result = $db->query("SELECT * FROM product WHERE id = '$pageId'");




            $i = 0;
            while ($row = $result->fetch())
            {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['brand'] = $row['brand'];
                $products[$i]['description'] = $row['description'];
                $products[$i]['image'] = $row['image'];



                $i++;
            }
            return $products;
        }
    }





}