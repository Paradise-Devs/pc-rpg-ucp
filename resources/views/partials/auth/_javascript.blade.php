{{ HTML::script('vendor/jquery/jquery-1.11.1.min.js') }}
{{ HTML::script('vendor/jquery/jquery_ui/jquery-ui.min.js') }}
{{ HTML::script('vendor/plugins/canvasbg/canvasbg.js') }}
{{ HTML::script('assets/js/utility/utility.js') }}
{{ HTML::script('assets/js/demo/demo.js') }}
{{ HTML::script('assets/js/main.js') }}
<script type="text/javascript">
    jQuery(document).ready(function() {
      "use strict";
      Core.init();
      Demo.init();
      CanvasBG.init({
        Loc: {
          x: window.innerWidth / 2.1,
          y: window.innerHeight / 4.2
        },
      });
    });
</script>
