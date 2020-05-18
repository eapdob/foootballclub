<?php require_once("../../config.php"); ?>

<?php
if (isset($_GET['id'])) {
    $query = query("DELETE FROM games WHERE game_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    set_message('Игра удалена');
    redirect("../../../public_html/admin/index.php?game");
} else {
    set_message('Error wrong id');
    redirect("../../../public_html/admin/index.php?game");
}
?>