/* ===================================================
 * Custom document to enable/disable the submit button
 * ========================================================== */
$(document).ready(function(){
	$("#submit_ticket").addClass("disabled");
	$("#ticket_panel").addClass("theme-primary");
	$("#ticket_panel_heading").addClass("panel-primary");

	if($("#status_select").data("status") != 3) {
		$(".closed_ticket").hide();
    }
	else {
		$(".opened_ticket").hide();
    }

	$("#edit_answer_div").hide();

	$("#edit_answer_btn").click(function() {
		$("#block_answer").hide(500);
		$("#edit_answer_div").show(500);
	});

	$("#save_edit_answer_btn").click(function() {
		$("#block_answer").show(500);
		$("#edit_answer_div").hide(500);
	});

	$("#remove_answer_btn").click(function() {
		$("#admin_response").hide(500);
	});

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
