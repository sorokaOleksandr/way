<?php


class DeleteController{

    public function actionDelete($id){

        session_start();

        if( isset($_SESSION['admin']) ) {


            $show = array();
            $show = Admin::getShowProducts();



            if(isset($_POST['submit'])){

                $id = $_POST['id'];

                Admin::deleteProductById($id);

                header("Location: /delete");


            }
            require_once(ROOT.'/views/admin/admin_delete.php');



        }else{
            echo 'error';
        }

        return true;


    }

}