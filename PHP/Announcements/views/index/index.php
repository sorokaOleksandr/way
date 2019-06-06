
<?php require_once ('views/hed_foot/head.php')?>

<?php if(isset($result_form) && is_array($result_form)): ?>
    <?php foreach($result_form as $val => $res): ?>
        <h5 style="color: red"><?php echo $res; ?></h5>
    <?php endforeach; ?>
<?php endif; ?>
<br>

<a href="/create" class="btn btn-outline-primary" role="button" style="margin-left: 20%"> + Добавить обьявление</a><br><br>


<?php foreach ($all_announcements as $announcements_List): ?>

<div class="row" style="width: 60%; margin: auto; border: 1px dashed black">
    <div class="col-sm-4" style="background-color:lavender;">
        <img  src="template/images/<?php echo $announcements_List['photo']; ?>"  width="150px" height="150px"
        hspace="5" vspace="7">
    </div>
    <div class="col-sm-8">
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th><?php echo $announcements_List['headline']; ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $announcements_List['description']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <br>
<?php endforeach; ?>


<?php require_once ('views/hed_foot/foot.php')?>


