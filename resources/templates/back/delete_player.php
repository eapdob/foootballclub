<?php require_once("../../config.php"); ?>
<?php
if (isset($_GET['id'])) {
    $query = query("DELETE FROM players WHERE player_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    set_message('Игрок удален');
    redirect("../../../public_html/admin/index.php");
} else {
    set_message('Ошибка не правильный id');
    redirect("../../../public_html/admin/index.php");
}
?>