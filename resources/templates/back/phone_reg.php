<?php set_telephone_in_admin(); ?>
<div class="row">
  <div class="col">
    <header>
      <h5>Мой телефон</h5>
      <h5><?php display_message(); ?></h5>
      <form class="form-vertical" method="post">
        <div class="form-group"><label for="user_phone">
            <input type="tel" name="user_phone" class="form-control" pattern="^\d{10}$"
                   placeholder="Телефон 0631234567"></label>
        </div>
        <div class="form-group">
          <input type="submit" name="submitUserPhone" class="btn btn-primary" value="Записать">
        </div>
      </form>
    </header>
  </div>
</div>
<hr>