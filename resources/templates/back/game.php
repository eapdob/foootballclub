<?php add_game(); ?>

<h1 class="page-header">
    Организовать игру
</h1>

<div class="col-md-4">

    <h3 class="bg-success"><?php display_message(); ?></h3>

    <form method="post">

        <div class="form-group">
            <label class="control-label" for="field">№ Поля</label>
            <div class="input-group">
                <input class="form-control" name="field" type="number" min="1">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-screenshot"></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="date">Дата</label>
            <div class="input-group date">
                <input type="text" class="form-control" name="date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label" for="time">Время</label>
            <div class="input-group">
                <input type="time" class="form-control" name="time">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <input name="add_game" type="submit" class="btn btn-primary btn-md" value="Создать">
        </div>


    </form>

    <br>

</div>


<div class="col-md-8">

    <table class="table">
        <thead>
        <h2>Ближайшая организованная игра</h2>
        <tr>
            <th>№ Поля</th>
            <th>Дата</th>
            <th>Время</th>
        </tr>
        </thead>
        <tbody>
            <?php show_game_in_admin(); ?>
        </tbody>

    </table>

</div>
