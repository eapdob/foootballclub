
</div>
<!-- /#wrapper -->

<script type="text/javascript">
    $(document).ready(function(){
        var date_input = $('input[name="date"]');
        var container = $('#page-wrapper form').length > 0 ? $('#page-wrapper form').parent() : "body";
        var options = {
            weekStart: 1,
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            language: "ru-RU"
        };
        date_input.datepicker(options);
    });
</script>


<!-- Morris Charts JavaScript -->
<script src="/public_html/admin/js/plugins/morris/raphael.min.js"></script>
<script src="/public_html/admin/js/plugins/morris/morris.min.js"></script>
<script src="/public_html/admin/js/plugins/morris/morris-data.js"></script>

</body>

</html>