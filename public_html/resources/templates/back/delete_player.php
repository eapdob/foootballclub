<?php require_once('../../../../resources/config.php'); ?>

<?php
if (isset($_GET['id'])) {
    $query = query("DELETE FROM players WHERE player_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    set_message('Игрок удален');
    redirect("../../../admin/index.php");
} else {
    set_message('Ошибка не правильный id');
    redirect("../../../admin/index.php");
}
?>