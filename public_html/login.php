<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<?php
if (isset($_SESSION['username'])) {
    redirect("admin/index.php");
}
?>
<div class="page-wrapper">
  <div class="container">
    <header>
      <h5 class="text-center pt-3 mb-3">Админ</h5>
      <h5 class="text-center bg-warning"><?php display_message(); ?></h5>
      <div>
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
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Войти">
          </div>
        </form>
      </div>
    </header>
  </div>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>