/* ===================================================
 * custom faq js for hiding elements while searching
 * ========================================================== */
$(document).ready(function(){
    $('#friend_search').hideseek({
      list:             '.friend_item',
      ignore:           '.badge'
    });
 });
