<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- User Content -->
    <div class="container">

        <div class="col-sm-8 col-sm-offset-2">
            <form class="form-vertical" method="post">
                <?php
                    show_greetings();
                    if (is_game_exists()) {
                        show_announce();
                    }
                    participate_in();
                ?>
                <h4 class="text-center bg-warning"><?php echo display_message(); ?></h4>
                <br>
                <div class="form-group text-center">
                    <label for="player_name">
                        <input type="text" name="player_name" class="form-control" placeholder="Имя">
                    </label>
                </div>
                <div class="form-group text-center">
                    <label for="player_phone">
                        <input type="tel" name="player_phone" class="form-control" placeholder="Тел 0661234567" pattern="^\d{10}$">
                    </label>
                </div>
                <div class="form-group text-center">
                    <input style="width: 215px;" type="submit" name="submit" class="btn btn-primary" value="Я буду играть">
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>