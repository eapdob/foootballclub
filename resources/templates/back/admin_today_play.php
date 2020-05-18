<!-- FIRST ROW WITH PANELS -->


<!-- Page Heading -->
<div class="row">
    <!-- Today Game Content -->
    <div>
        <?php
            if (!is_game_exists()) {
                show_no_games_warning();
                return;
            } else {
                show_announce();
            }
            // full of list players
            if (get_current_number_of_players() == 10) {
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

            <?php get_today_players_in_admin(); ?>

            </tbody>
        </table>
    </div>
    <!-- /.container -->
</div>
<!-- /.row -->

