<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<div class="page-wrapper">
  <div class="container pt-3">
      <?php
      global $qtyPlayers;
      if (!is_game_exists()) {
          show_no_games_warning();
          return;
      } else {
          show_announce();
      }
      // full of list players
      if (get_current_number_of_players() == $qtyPlayers) {
          set_message('<div class="alert alert-success" role="alert">Все хорошо все в сборе</div>');
      }
      ?>
    <h5><?php display_message(); ?></h5>
    <h5 class="page-header mb-3">
      Все игроки
    </h5>
    <table class="table table-hover">
      <thead>
      <tr>
        <th>#</th>
        <th>Имя</th>
        <th>Телефон</th>
      </tr>
      </thead>
      <tbody>
      <?php get_today_players(); ?>
      </tbody>
    </table>
  </div>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>