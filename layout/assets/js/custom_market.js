/* ===================================================
 * custom market js for everything
 * ========================================================== */
$(document).ready(function(){
    $("#minValue").mask("999");
    $("#maxValue").mask("999.999.999.999");
    $("#no-promo-notify").hide();

    $("#promohide").on('change', function() {
		if($(this).is(":checked")) {
            $(".promo-item").show(1000);
            $("#no-promo-notify").hide(1000);
        } else {
            $(".promo-item").hide(1000);
            $("#no-promo-notify").show(1000);
        }
    });
 });
