<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Today Game Content -->
    <div class="container">
        <?php
            if (!is_game_exists()) {
                show_no_games_warning();
                return;
            } else {
                show_announce();
            }
            global $qtyPlayers;
            // full of list players
            if (get_current_number_of_players() == $qtyPlayers) {
                set_message('Все хорошо все в сборе');
            }
        ?>

        <h4 class="bg-success"><?php display_message(); ?></h4>

        <h4 class="page-header">
            Все игроки
        </h4>

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
    <br>
    <br>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>