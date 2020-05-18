<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<div class="page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col">
        <form class="form-vertical" method="post">
            <?php
            show_greetings();
            if (is_game_exists()) {
                show_announce();
            }
            participate_in();
            ?>
          <h5 class="text-center mb-3"><?php echo display_message(); ?></h5>
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
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Я буду играть">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>