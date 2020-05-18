<?php
if (isset($_GET['id'])) {
    $query = query("SELECT * FROM games WHERE game_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {
        $field = escape_string($row['game_field']);
        $date = escape_string($row['game_date']);
        $time = escape_string($row['game_time']);
    }

    update_game();
}
?>
<div class="row">
  <div class="col">
    <h5 class="page-header">
      Редактировать игру
    </h5>
    <h5 class="mb-3"><?php display_message(); ?></h5>
    <form class="form-vertical" method="post">
      <div class="form-group">
        <label class="control-label" for="field">№ Поля</label>
        <div class="input-group">
          <input class="form-control" name="field" type="number" min="1" value="<?php echo $field; ?>">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-screenshot"></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="date">Дата</label>
        <div class="input-group date">
          <input type="text" class="form-control" name="date" value="<?php echo $date; ?>">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="time">Время</label>
        <div class="input-group">
          <input type="time" class="form-control" name="time" value="<?php echo $time; ?>">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </div>
        </div>
      </div>
      <br>
      <div class="form-group">
        <input name="update" type="submit" class="btn btn-primary btn-md" value="Обновить игру">
      </div>
    </form>
  </div>
</div>