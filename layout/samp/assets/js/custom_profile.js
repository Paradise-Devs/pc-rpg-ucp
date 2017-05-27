/* ===================================================
 * custom faq js for hiding elements while searching
 * ========================================================== */
$(document).ready(function(){
    $("#acconfig_btn").hide();
    $("#unfriend_btn").hide();
    $("#unblock_btn").hide();
    $("#changecover_btn").hide();
    $("#removecover_btn").hide();
    $("#report_btn_single").hide();
    $("#blocked_info").hide();
    $("#banned_info").hide();

    $('#player_select').multiselect({
        includeSelectAllOption: true,
        buttonClass: 'multiselect dropdown-toggle btn btn-sm btn-system btn-gradient dark'
    });

    $("#player_select").on('change', function() {
		if($(this).val() == 'guest') {
			$("#acconfig_btn").hide(1000);
            $("#unfriend_btn").hide(1000);
            $("#changecover_btn").hide(1000);
            $("#removecover_btn").hide(1000);
            $("#banned_info").hide(1000);
            $("#blocked_info").hide(1000);
            $("#unblock_btn").hide(1000);
            $("#report_btn_single").hide(1000);

            $("#friend_btn").show(1000);
            $("#message_btn").show(1000);
            $("#block_btn").show(1000);
            $("#report_btn").show(1000);
        }
		else if($(this).val() == 'friend') {
            $("#acconfig_btn").hide(1000);
            $("#friend_btn").hide(1000);
            $("#changecover_btn").hide(1000);
            $("#removecover_btn").hide(1000);
            $("#banned_info").hide(1000);
            $("#blocked_info").hide(1000);
            $("#unblock_btn").hide(1000);
            $("#report_btn_single").hide(1000);

            $("#unfriend_btn").show(1000);
            $("#message_btn").show(1000);
            $("#block_btn").show(1000);
            $("#report_btn").show(1000);
        }
        else if($(this).val() == 'owner') {
            $("#friend_btn").hide(1000);
            $("#unfriend_btn").hide(1000);
            $("#block_btn").hide(1000);
            $("#message_btn").hide(1000);
            $("#report_btn").hide(1000);
            $("#unblock_btn").hide(1000);
            $("#banned_info").hide(1000);
            $("#blocked_info").hide(1000);
            $("#report_btn_single").hide(1000);

            $("#acconfig_btn").show(1000);
            $("#changecover_btn").show(1000);
            $("#removecover_btn").show(1000);
        }
        else if($(this).val() == 'blocked') {
            $("#friend_btn").hide(1000);
            $("#unfriend_btn").hide(1000);
            $("#block_btn").hide(1000);
            $("#report_btn").hide(1000);
            $("#changecover_btn").hide(1000);
            $("#removecover_btn").hide(1000);
            $("#acconfig_btn").hide(1000);
            $("#banned_info").hide(1000);
            $("#blocked_info").hide(1000);

            $("#unblock_btn").show(1000);
            $("#report_btn_single").show(1000);
            $("#blocked_info").show(1000);
        }
        else if($(this).val() == 'banned') {
            $("#acconfig_btn").hide(1000);
            $("#friend_btn").hide(1000);
            $("#unfriend_btn").hide(1000);
            $("#block_btn").hide(1000);
            $("#message_btn").hide(1000);
            $("#report_btn").hide(1000);
            $("#unblock_btn").hide(1000);
            $("#changecover_btn").hide(1000);
            $("#removecover_btn").hide(1000);
            $("#report_btn_single").hide(1000);
            $("#blocked_info").hide(1000);

            $("#banned_info").show(1000);
        }
    });
 });
