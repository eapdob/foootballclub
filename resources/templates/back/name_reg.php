<?php set_user_name_in_admin(); ?>
<div class="row">
    <div class="col">
        <header>
            <h5>Мое имя в списке</h5>
            <h5><?php display_message(); ?></h5>
            <form class="form-vertical" method="post">
                <div class="form-group"><label for="user_name">
                        <input type="text" name="user_name" class="form-control" placeholder="Имя"></label>
                </div>
                <div class="form-group">
                    <input type="submit" name="submitUserName" class="btn btn-primary" value="Записать">
                </div>
            </form>
        </header>
    </div>
</div>
<hr>