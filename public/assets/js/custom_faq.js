/* ===================================================
 * custom faq js for hiding elements while searching
 * ========================================================== */
$(document).ready(function(){
    $('#faqSearch').hideseek({
      list:             '.faqItem',
      ignore:           '.collapse'
    });

 	$("#faqSearch").keyup(function (e) {
 		if(!$(this).val()) {
            $("#recentAnswered").removeClass("hidden");
 		}
 		else {
            $("#recentAnswered").addClass("hidden");
 		}
 	});
 });
