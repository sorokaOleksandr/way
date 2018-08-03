



<?php require_once(ROOT.'/views/loyouts/header.php'); ?>

<!-- start page -->
<div id="page">
    <!-- start content -->
    <div id="content">
        <div class="post">
            <h1 class="title">Заказ столика </h1><br>
            <div class="entry">
                <div class="col-md-8 col-sm-8">
                    <form action="" method="post" role="form" class="contactForm">
                        <div id="errormessage"></div>
                        Ваше имя:
                        <div class="col-md-6 col-sm-6 contact-form pad-form">
                            <div class="form-group label-floating is-empty">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <br>
                        Телефон:
                        <div class="col-md-6 col-sm-6 contact-form">
                            <div class="form-group">
                                <input type="text" class="form-control label-floating is-empty" name="phone" id="phone" placeholder="Phone" data-rule="required" data-msg="This field is required" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <br>
                        На когда?
                        <div class="col-md-6 col-sm-6 contact-form">
                            <div class="form-group">
                                <input type="date" class="form-control label-floating is-empty" name="date" id="date" placeholder="Date" data-rule="required" data-msg="This field is required" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <br>
                        Время?
                        <div class="col-md-6 col-sm-6 contact-form">
                            <div class="form-group">
                                <input type="time" class="form-control label-floating is-empty" name="time" id="time" placeholder="Time" data-rule="required" data-msg="This field is required" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <br>
                        Сколько человек?
                        <div class="col-md-6 col-sm-6 contact-form">
                            <div class="form-group">
                                <input type="text" class="form-control label-floating is-empty" name="people" id="people" placeholder="People" data-rule="required" data-msg="This field is required" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 btnpad">
                            <div class="contacts-btn-pad">
                                <input type="submit" value="Заказать">
                            </div>
                            <?php if(isset($message_form) && is_array($message_form)): ?>

                                <?php foreach($message_form as $val => $res): ?>
                                    <p><?php echo $res; ?></p>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->



    <?php require_once(ROOT.'/views/loyouts/footer.php'); ?>
