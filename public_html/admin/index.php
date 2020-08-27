<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . "/header.php"); ?>
<?php
if (!isset($_SESSION['username'])) {
    redirect("../login.php");
}
?>
<div class="page-wrapper">
  <div class="container">
      <?php
      if (!isset($_SESSION['user_name'])) {
          include(TEMPLATE_BACK . "/name_reg.php");
      }
      if (!isset($_SESSION['user_phone'])) {
          include(TEMPLATE_BACK . "/phone_reg.php");
      }
      if (get_admin_uri() == "/admin/" || get_admin_uri() == "/admin/index.php") {
          include(TEMPLATE_BACK . "/admin_today_play.php");
      }
      if (isset($_GET['game'])) {
          include(TEMPLATE_BACK . "/game.php");
      }
      if (isset($_GET['edit_game'])) {
          include(TEMPLATE_BACK . "/edit_game.php");
      }
      if (isset($_GET['edit_player'])) {
          include(TEMPLATE_BACK . "/edit_player.php");
      }
      ?>
  </div>
</div>
<?php include(TEMPLATE_BACK . "/footer.php"); ?>
