<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Lottery play';
?>


<h1>Lottery play</h1>

<button id="spin" type="button" class="btn btn-primary">крутить барабан</button><br>

<?php  var_dump($res) ?>



<?php
$this->registerJs("$('#spin').click(function(){
$.ajax({
    url: '".Url::to(["site/spin"])."',        
    method: 'POST',       
      });
});");

?>


