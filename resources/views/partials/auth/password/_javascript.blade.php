<script src="../vendor/jquery/jquery-1.11.1.min.js"></script>
<script src="../vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
<script src="../vendor/plugins/canvasbg/canvasbg.js"></script>
<script src="../assets/js/utility/utility.js"></script>
<script src="../assets/js/demo/demo.js"></script>
<script src="../assets/js/main.js"></script>
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
