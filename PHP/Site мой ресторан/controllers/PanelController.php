<?php

class PanelController{

    public function actionPanel(){

        session_start();

        if( isset($_SESSION['admin']) ) {

            require_once(ROOT.'/views/admin/admin_panel.php');

        }else{
            header("Location: /admin");

        }

        return true;

    }

}