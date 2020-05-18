<?php require_once('../../../../resources/config.php'); ?>

<?php
if (isset($_GET['id'])) {
    $query = query("DELETE FROM games WHERE game_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    set_message('<div class="alert alert-success" role="alert">Игра удалена</div>');
    redirect("../../../admin/index.php?game");
} else {
    set_message('<div class="alert alert-danger" role="alert">Error wrong id</div>');
    redirect("../../../admin/index.php?game");
}
?>