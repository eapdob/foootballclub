<footer>
  <div class="container">
    <div class="row">
      <div class="col">
        <p class="text-center">&copy; foootball.club</p>
      </div>
    </div>
  </div>
</footer>
<script>
  var date_input = $('input[name="date"]');
    var container = $('.page-wrapper form').length > 0 ? $('.page-wrapper form').parent() : "body";
    var options = {
        weekStart: 1,
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        language: "ru-RU"
    };
    date_input.datepicker(options);
</script>
</body>
</html>