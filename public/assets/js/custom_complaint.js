/* ===================================================
 * Custom document to show/hide punishment div elements
 * ========================================================== */
$(document).ready(function(){
	$(".punishment-option").hide();
	$(".overrule-option").hide();
	$("#accept-button").addClass("disabled");
	$("#deny-button").addClass("disabled");
	$("#reason_accept").prop("disabled", true);

	$("#overrule").on('change', function() {
		if($(this).val() == 'other') {
			$(".overrule-option").hide();
			$("#deny-button").addClass("disabled");

			$("#other_div").show(50);
			$("#other_div").addClass("animated fadeInRight");

			$("#reason_deny").keyup(function (e) {
				if(!$("#reason_deny").val()) { $("#deny-button").addClass("disabled"); }
				else { $("#deny-button").removeClass("disabled"); }
			});
		}
		else if($(this).val() == 'no_evidence') {
			$(".overrule-option").hide();
			$("#deny-button").removeClass("disabled");

			$("#noevidence_div").show(50);
			$("#noevidence_div").addClass("animated fadeInRight");
		}
		else if($(this).val() == 'already_punished') {
			$(".overrule-option").hide();
			$("#deny-button").removeClass("disabled");

			$("#already_punished_div").show(50);
			$("#already_punished_div").addClass("animated fadeInRight");
		}
		else {
			$(".overrule-option").hide();
			$("#reason_deny").hide();
			$("#deny-button").addClass("disabled");
		}
	});

 	$("#punishment").on('change', function() {
		$("#reason_accept").keyup(function (e) {
			if($("#punishment").val() != 'null') {
		 		if(!$("#reason_accept").val()) { $("#accept-button").addClass("disabled"); }
		 		else { $("#accept-button").removeClass("disabled"); }
			}
	 	});
        if($(this).val() == 'null') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", true);
        }
        else if($(this).val() == 'notification_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

 		    $("#notification_div").show(50);
			$("#notification_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'tempban_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

			$("#tempbandays_slider").slider({
			    range: "min",
			    min: 1,
			    max: 7,
			    value: 3,
				slide: function( event, ui ) {
			       $( "#tempban_label" ).val( ui.value + " dia(s)" );
			    }
			});

 		    $("#tempban_div").show(50);
			$("#tempban_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'permaban_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

 		    $("#permaban_div").show(50);
			$("#permaban_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'resetacc_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

 		    $("#resetacc_div").show(50);
			$("#resetacc_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'deleteacc_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

 		    $("#deleteacc_div").show(50);
			$("#deleteacc_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'applyticket_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

			$("#ticket_slider").slider({
			    range: "min",
			    min: 500,
			    max: 100000,
			    value: 500,
				step: 500,
				slide: function( event, ui ) {
			       $( "#ticket_label" ).val("$" + ui.value);
			    }
			});

			$("#applyticket_div").show(50);
			$("#applyticket_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'sendtoprision_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

			$("#sendtoprision_slider").slider({
			    range: "min",
			    min: 1,
			    max: 24,
			    value: 2,
				slide: function( event, ui ) {
			       $("#prision_label").val(ui.value + " hora(s)");
			    }
			});

 		    $("#sendtoprision_div").show(50);
			$("#sendtoprision_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'sendtouw_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

			$("#sendtouw_slider").slider({
			    range: "min",
			    min: 1,
			    max: 24,
			    value: 2,
				slide: function( event, ui ) {
			       $("#uw_label").val(ui.value + " hora(s)");
			    }
			});

			$("#sendtouw_div").show(50);
			$("#sendtouw_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'jobremove_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

 		    $("#jobremove_div").show(50);
			$("#jobremove_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'changestats_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

 		    $("#changestats_div").show(50);
			$("#changestats_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'groupremove_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

 		    $("#groupremove_div").show(50);
			$("#groupremove_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'sellpatrimony_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

 		    $("#sellpatrimony_div").show(50);
			$("#sellpatrimony_div").addClass("animated fadeInRight");
        }
		else if($(this).val() == 'resetpatrimony_id') {
            $(".punishment-option").hide();
			$("#reason_accept").prop("disabled", false);

 		    $("#resetpatrimony_div").show(50);
			$("#resetpatrimony_div").addClass("animated fadeInRight");
        }
		else {
 		    $(".punishment-option").hide();
        }
    });
});
