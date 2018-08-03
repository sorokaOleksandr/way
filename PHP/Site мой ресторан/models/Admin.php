<?php

class Admin{


        public static function getShowProducts(){

            $db = Db::getConnection();

            $showProducts = array();

            $result = $db->query('SELECT * FROM product ORDER BY id ASC');

            $i = 0;
            while ($row = $result->fetch()){
                $showProducts[$i]['id'] = $row['id'];
                $showProducts[$i]['name'] = $row['name'];
                $showProducts[$i]['description'] = $row['description'];
                $showProducts[$i]['price'] = $row['price'];
                $showProducts[$i]['category_id'] = $row['category_id'];
                $i++;
            }
            return $showProducts;
        }

    public static function deleteProductById($id){


        $db = Db::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();

    }

    public static function addProduct($name, $category_id, $price, $description, $file_b){


        $db = Db::getConnection();


        $sql = "INSERT INTO product (name, category_id, price, description, image) VALUES (:name, :category_id, :price, :description, :image)";


        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->bindParam(':category_id', $category_id);
        $result->bindParam(':price', $price);
        $result->bindParam(':description', $description);
        $result->bindParam(':image', $file_b);

        return $result->execute();
    }


}