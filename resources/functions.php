<?php

// helper functions
function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location)
{
    return header("Location: $location ");
}

function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function is_game_exists()
{
    $game_query = query("SELECT * FROM games");
    confirm($game_query);
    if (mysqli_num_rows($game_query) == 0) {
        return false;
    }
    return true;
}

function get_current_game_id()
{
    $game_query = query("SELECT * FROM `games` ORDER BY game_id DESC");
    confirm($game_query);
    $row = fetch_array($game_query);

    return $row['game_id'];
}

function get_current_number_of_players()
{
    $player_query = query("SELECT * FROM players WHERE game_id = " . escape_string(get_current_game_id()) . " ");
    confirm($player_query);
    $num_players = mysqli_num_rows($player_query);
    return $num_players;
}

/****************************FRONT END FUNCTIONS************************/

function participate_in()
{
    if (isset($_POST['submit']) && $_POST['submit']) {
        if ($_POST['player_name'] === "" && $_POST['player_phone'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите имя и телефон</div>");
            return;
        }
        if (empty($_POST['player_name']) || $_POST['player_name'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите имя</div>");
            return;
        }
        if (empty($_POST['player_phone']) || $_POST['player_phone'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите телефон</div>");
            return;
        }
        // check if game exist
        if (!is_game_exists()) {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Сорри, в ближайшее время игр нету</div>");
            return;
        }
        // define quantity of players
        global $qtyPlayers;
        // for definition of game
        $current_game_id = get_current_game_id();
        // number of player today
        $num_players = get_current_number_of_players();
        // input values
        $player_name = escape_string($_POST['player_name']);
        $player_phone = escape_string($_POST['player_phone']);
        // check if we can added
        if ($num_players < $qtyPlayers) {
            $insert_player = query("INSERT INTO players (game_id ,player_name, player_phone) 
                                      VALUES ({$current_game_id}, '{$player_name}', '{$player_phone}')");
            confirm($insert_player);
            redirect("today_game.php");
        } else {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Полный список мест нету</div>");
        } // validation
    }
}

function get_today_players()
{
    $num_players = 0;
    $today_players_query = query("SELECT * FROM players WHERE game_id = " . escape_string(get_current_game_id()) . " ");
    confirm($today_players_query);

    while ($row = fetch_array($today_players_query)) {
        $num_players++;
        $player = <<<DELIMETER
            <tr>
                <td>{$num_players}</td>
                <td>{$row['player_name']}</td>
                <td>{$row['player_phone']}</td>
            </tr>
DELIMETER;
        echo $player;
    }
}

/****************************BACK END FUNCTIONS************************/

function get_admin_uri()
{
    // some modifications to get uri /admin
    $uri = $_SERVER['REQUEST_URI'];
    $len = strlen($uri);
    $pos_admin = stripos($uri, 'admin');
    if ($pos_admin === false) {
        return false;
    }
    $uri_len = $len - $pos_admin + 1;
    $uri_admin = substr($uri, $pos_admin - 1, $uri_len);
    return $uri_admin;
}

function login_user()
{
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = query("SELECT * FROM users WHERE user_name = '{$username}' AND user_password = '{$password}' ");
        //confirm($query);

        if (mysqli_num_rows($query) == 0) {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Имя и пароль не верны</div>");
            redirect("login.php");
        } else {
            $_SESSION['username'] = $username;
            redirect("admin/index.php");
        }
    }
}

function get_today_players_in_admin()
{
    $num_players = 0;
    $current_game_id = get_current_game_id();
    $today_players_query = query("SELECT * FROM players WHERE game_id = " . escape_string($current_game_id) . " ");
    confirm($today_players_query);

    while ($row = fetch_array($today_players_query)) {
        $num_players++;
        $player = <<<DELIMETER
            <tr>
                <td>{$num_players}</td>
                <td><a href="admin/index.php?edit_player&id={$row['player_id']}">{$row['player_name']}</td>
                <td>{$row['player_phone']}</td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Ты уверен?');" href="../resources/templates/back/delete_player.php?id={$row['player_id']}">
                        <span class="far fa-times"></span>
                    </a>
                </td>
            </tr>
DELIMETER;
        echo $player;
    }
}

function update_player()
{
    if (isset($_POST['update']) && $_POST['update']) {
        if ($_POST['player_name'] === "" && $_POST['player_phone'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Редактируйте имя и телефон</div>");
            return;
        }
        if (empty($_POST['player_name']) || $_POST['player_name'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Редактируйте имя</div>");
            return;
        }
        if (empty($_POST['player_phone']) || $_POST['player_phone'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Редактируйте телефон</div>");
            return;
        }
        $player_name = escape_string($_POST['player_name']);
        $player_phone = escape_string($_POST['player_phone']);

        $send_update_query = query("UPDATE players SET player_name = '{$player_name}', player_phone = '{$player_phone}'
                        WHERE player_id = " . escape_string($_GET['id']) . " ");
        confirm($send_update_query);
        set_message("<div class=\"alert alert-success\" role=\"alert\">Игрок отредактирован</div>");
        redirect("index.php");
    }
}

function show_game_in_admin()
{
    $game_query = query("SELECT * FROM games");
    confirm($game_query);

    while ($row = fetch_array($game_query)) {
        $game = <<<DELIMITER
            <tr>
                <td><a href="admin/index.php?edit_game&id={$row['game_id']}">&nbsp;{$row['game_field']}</td>
                <td>{$row['game_date']}</td>
                <td>{$row['game_time']}</td>
                <td><a class="btn btn-danger" onclick="return confirm('Ты уверен?');" href="../resources/templates/back/delete_game.php?id={$row['game_id']}">
                        <span class="far fa-times"></span>
                    </a></td>
            </tr>
DELIMITER;
        echo $game;
    }
}

function update_game()
{
    if (isset($_POST['update']) && $_POST['update']) {
        if ($_POST['field'] == 0 && $_POST['date'] === "" && $_POST['time'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите поле, дату и время</div>");
            return;
        }
        if (empty($_POST['field']) || $_POST['field'] == 0) {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите поле</div>");
            return;
        }
        if (empty($_POST['date']) || $_POST['date'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите дату</div>");
            return;
        }
        if (empty($_POST['time']) || $_POST['time'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите время</div>");
            return;
        }

        $field = escape_string($_POST['field']);
        $date = escape_string($_POST['date']);
        $time = escape_string($_POST['time']);

        $update_game_query = query("UPDATE games SET game_field = {$field}, game_date = '{$date}', game_time = '{$time}'
                                      WHERE game_id = " . escape_string($_GET['id']) . " ");
        confirm($update_game_query);
        set_message("<div class=\"alert alert-success\" role=\"alert\">Игра обновлена</div>");
        redirect("index.php?game");
    }
}

function add_game()
{
    if (isset($_POST['add_game']) && $_POST['add_game']) {
        if ($_POST['field'] == 0 && $_POST['date'] === "" && $_POST['time'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите поле, дату и время</div>");
            return;
        }
        if (empty($_POST['field']) || $_POST['field'] == 0) {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите поле</div>");
            return;
        }
        if (empty($_POST['date']) || $_POST['date'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите дату</div>");
            return;
        }
        if (empty($_POST['time']) || $_POST['time'] === "") {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Введите время</div>");
            return;
        }
        if (one_game_exists()) {
            set_message("<div class=\"alert alert-danger\" role=\"alert\">Только одну игру мы можем создать, удалите прошлую</div>");
            return;
        }
        $field = escape_string($_POST['field']);
        $date = escape_string($_POST['date']);
        $time = escape_string($_POST['time']);

        $date = explode('/', $date);
        $date = array_reverse($date);
        $date = implode('-', $date);

        $insert_query = query("INSERT INTO games (game_field, game_date, game_time) VALUES ({$field}, '{$date}', '{$time}')");
        confirm($insert_query);

        $insert_first_player = query("INSERT INTO players (player_name, player_phone, game_id)
                                VALUES('{$_SESSION['user_name']}', '{$_SESSION['user_phone']}', " . escape_string(get_current_game_id()) . ")");
        confirm($insert_first_player);
        set_message("<div class=\"alert alert-success\" role=\"alert\">Создали игру</div>");
        redirect("index.php?game");
    }
}

function one_game_exists()
{
    $game_query = query("SELECT * FROM games");
    confirm($game_query);
    if (mysqli_num_rows($game_query) == 1) {
        return true;
    }
    return false;
}

function set_user_name_in_admin()
{
    if (isset($_POST['submitUserName'])) {
        if (isset($_POST['user_name']) && $_POST['user_name'] !== '') {
            $user_name = $_POST['user_name'];
            $_SESSION['user_name'] = $user_name;
            redirect("index.php");
        }
    }
}

function set_telephone_in_admin()
{
    if (isset($_POST['submitUserPhone'])) {
        if (isset($_POST['user_phone']) && $_POST['user_phone'] !== '') {
            $user_phone = $_POST['user_phone'];
            $_SESSION['user_phone'] = $user_phone;
            redirect("index.php");
        }
    }
}

// addition functions to represent announces and messages

function get_game_details()
{
    $game_details = array();
    $time_query = query("SELECT * FROM games WHERE game_id =" . get_current_game_id() . " ");
    confirm($time_query);

    while ($row = fetch_array($time_query)) {
        $game_details['field'] = $row['game_field'];
        $game_details['date'] = $row['game_date'];
        $game_details['time'] = $row['game_time'];
    }
    return $game_details;
}

function show_announce()
{
    if (!empty(get_game_details())) {
        $day = get_day_of_game(get_game_details()['date']);
        $time = get_game_details()['time'];
        echo "<h5 class=\"anouncement text-center\">{$day}, {$time}</h5>";
    }
}

function get_day_of_game($time)
{
    $time = explode('/', $time);
    $time = array_reverse($time);
    $time = implode('-', $time);

    $timestamp = strtotime($time);
    $days = array(
        'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
        'Четверг', 'Пятница', 'Суббота'
    );
    $day = date('w', $timestamp);
    return $days[($day)];
}

function show_greetings()
{
    echo "<h5 class=\"mt-3 text-center\">Играем в футбол</h5><hr/>";
}

function show_no_games_warning()
{
    set_message("<div class=\"alert alert-danger\" role=\"alert\">Сорри, в ближайшее время игр нету</div>");
    echo "<h5>";
    display_message();
    echo "</h5>";
}

?>