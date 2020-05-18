<?php
if (isset($_GET['id'])) {
    $query = query("SELECT * FROM players WHERE player_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {
        $player_name = ($row['player_name']);
        $player_phone = ($row['player_phone']);
    }

    update_player();
}
?>
<div class="row">
  <div class="col">
    <h5 class="page-header">
      Редактирование игрока
    </h5>
    <h5 class="bg-warning"><?php display_message(); ?></h5>
    <form class="form-vertical" method="post">
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
          <input type="tel" name="player_phone" class="form-control" pattern="^\d{10}$"
                 value="<?php echo $player_phone; ?>">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-earphone"></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="submit" name="update" class="btn btn-primary btn-md" value="Обновить">
      </div>
    </form>
  </div>
</div>

