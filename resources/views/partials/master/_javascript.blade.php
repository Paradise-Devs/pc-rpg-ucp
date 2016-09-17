<!-- jQuery -->
<script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

<!-- Theme Javascript -->
<script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>
<script src="{{ URL::asset('assets/js/demo/demo.js') }}"></script>
<script src="{{ URL::asset('assets/js/main.js') }}"></script>
<script src="https://use.fontawesome.com/e3b997c221.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
      "use strict";
      // Init Theme Core
      Core.init();
    });

    $(".sidebar-search").keyup(function (e) {
    if (e.keyCode == 13) {
        document.getElementById("search-form").submit();
    }
});
</script>
