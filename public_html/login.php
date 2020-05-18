<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<?php

if(isset($_SESSION['username'])) {
    redirect("admin/index.php");
}

?>
    <!-- Page Content -->
    <div class="container">
        <header>
            <h1 class="text-center">Админ</h1>
            <h4 class="text-center bg-warning"><?php display_message(); ?></h4>
            <div class="col-sm-4 col-sm-offset-4">
                <form class="form-vertical text-center" method="post">

                    <?php login_user(); ?>

                    <div class="form-group">
                        <label for="username">
                            <input type="text" name="username" class="form-control" placeholder="Имя">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="password">
                            <input type="password" name="password" class="form-control" placeholder="Пароль">
                        </label>
                    </div>
                    <div class="form-group">
                        <input style="width: 215px;" type="submit" name="submit" class="btn btn-primary" value="Войти">
                    </div>
                </form>
            </div>
        </header>
    </div>
    <br>
    <br>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>