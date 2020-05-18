<?php

if (isset($_GET['id'])) {
    $query = query("SELECT * FROM players WHERE player_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {
        $player_name  = ($row['player_name']);
        $player_phone = ($row['player_phone']);
    }

    update_player();
}



?>

<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Редактирование игрока
        </h1>
    </div>
    <h4 class="bg-warning"><?php display_message(); ?></h4>

    <form class="form-vertical" method="post">

        <div class="col-md-4">

            <div class="form-group">
                <label for="player_name">Имя игрока </label>
                <div class="input-group">
                    <input type="text" name="player_name" class="form-control" value="<?php echo $player_name; ?>">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="player_phone">Телефон игрока</label>
                <div class="input-group">
                    <input type="tel" name="player_phone" class="form-control" pattern="^\d{10}$" value="<?php echo $player_phone; ?>">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-earphone"></span>
                    </div>
                </div>

            </div>

            <br>

            <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary btn-md" value="Обновить">
            </div>

            <br>

        </div><!--Main Content-->

    </form>