<div class="navbar-header">
  <button type="button" class="d-md-block d-lg-none" data-toggle="collapse" data-target="#bs-example-navbar-collapse">
    <span class="far fa-bars"></span>
  </button>
  <div class="navbar-container collapse d-lg-block" id="bs-example-navbar-collapse">
    <ul class="navbar-list">
      <li>
        <a href="admin/index.php">Админ</a>
      </li>
      <li>
        <a href="../index.php">Регистрация</a>
      </li>
    </ul>
    <ul class="side-nav">
      <li>
        <a href="admin/index.php"><i class="fad fa-file-alt"></i> Список</a>
      </li>
      <li>
        <a href="admin/index.php?game"><i class="fad fa-futbol"></i> Игра</a>
      </li>
    </ul>
  </div>
</div>
<ul class="nav navbar-right">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
        <?php
        if (isset($_SESSION['username'])) {
            echo $_SESSION['username'];
        } else {
            echo "Незарегистрированный пользователь";
        }
        ?>
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li class="divider"></li>
      <li>
        <a href="admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Выйти</a>
      </li>
    </ul>
  </li>
</ul>