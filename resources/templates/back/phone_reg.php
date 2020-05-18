<?php set_telephone_in_admin(); ?>
<!-- Page Content -->
<div class="container">

    <header>
        <h1>Мой телефон</h1>
        <h2 class="bg-warning"><?php display_message(); ?></h2>
        <div class="col-sm-4">
            <form class="form-vertical" method="post">
                <div class="form-group"><label for="user_phone">
                        <input type="tel" name="user_phone" class="form-control" pattern="^\d{10}$" placeholder="Телефон 0631234567"></label>
                </div>
                <div class="form-group">
                    <input type="submit" name="submitPhone" class="btn btn-primary" value="Записать">
                </div>
            </form>
        </div>

    </header>
</div>
<hr>