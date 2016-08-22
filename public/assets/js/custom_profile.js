/* ===================================================
 * custom faq js for hiding elements while searching
 * ========================================================== */
$(document).ready(function(){
    $("#accconfig_btn").hide(1000);
    $("#unfriend_btn").hide(1000);
    $("#unblock_btn").hide(1000);
    $("#blocked_info").hide(1000);

    $('#friend_search').hideseek({
        list:             '.friend_item',
        ignore:           '.badge'
    });

    $('#player_select').multiselect({
        includeSelectAllOption: true,
        buttonClass: 'multiselect dropdown-toggle btn btn-sm btn-system btn-gradient dark'
    });

    $("#player_select").on('change', function() {
		if($(this).val() == 'guest') {
			$("#accconfig_btn").hide(1000);
            $("#unfriend_btn").hide(1000);

            $("#friend_btn").show(1000);
            $("#message_btn").show(1000);
            $("#block_btn").show(1000);
            $("#report_btn").show(1000);
        }
		else if($(this).val() == 'friend') {
            $("#accconfig_btn").hide(1000);
            $("#friend_btn").hide(1000);

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

            $("#accconfig_btn").show(1000);
        }
        else if($(this).val() == 'blocked') {
            $("#friend_btn").hide(1000);
            $("#unfriend_btn").hide(1000);
            $("#block_btn").hide(1000);
            $("#message_btn").hide(1000);
            $("#report_btn").hide(1000);

            $("#unblock_btn").show(1000);
            $("#blocked_info").show(1000);
        }
    });
 });
