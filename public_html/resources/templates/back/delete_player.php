<?php require_once('../../../../resources/config.php'); ?>

<?php
if (isset($_GET['id'])) {
    $query = query("DELETE FROM players WHERE player_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    set_message('<div class="alert alert-success" role="alert">Игрок удален</div>');
    redirect("../../../admin/index.php");
} else {
    set_message('<div class="alert alert-danger" role="alert">Ошибка не правильный id</div>');
    redirect("../../../admin/index.php");
}
?>