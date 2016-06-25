/* ===================================================
 * Custom document to enable/disable the submit button
 * ========================================================== */
$(document).ready(function(){
	$("#submit_ticket").addClass("disabled");
	$("#ticket_panel").addClass("theme-primary");
	$("#ticket_panel_heading").addClass("panel-primary");
	$(".closed_ticket").hide();

	$("#category").on('change', function() {
		if($(this).val() == 'default') {
			$("#submit_ticket").addClass("disabled");
        }
		else {
			$("#title").keyup(function (e) {
				if(!$("#title").val()) { $("#submit_ticket").addClass("disabled"); }
				else { $("#submit_ticket").removeClass("disabled"); }
			});
		}
	});

	$('#status_select').multiselect({
      includeSelectAllOption: true,
	  buttonClass: 'multiselect dropdown-toggle btn btn-sm btn-system btn-gradient dark'
    });

	$("#status_select").on('change', function() {
		if($(this).val() == 'opened') {
			$("#ticket_panel").removeClass("theme-primary theme-danger");
			$("#ticket_panel_heading").removeClass("panel-primary panel-danger");
			$(".closed_ticket").hide();

			$(".opened_ticket").show(1000);
			$("#ticket_panel").addClass("theme-primary");
			$("#ticket_panel_heading").addClass("panel-primary");
        }
		else if($(this).val() == 'closed') {
			$("#ticket_panel").removeClass("theme-primary theme-danger");
			$("#ticket_panel_heading").removeClass("panel-primary panel-danger");
			$(".opened_ticket").hide(1000);

			$(".closed_ticket").show();
			$("#ticket_panel").addClass("theme-danger");
			$("#ticket_panel_heading").addClass("panel-danger");
        }
	});
});
