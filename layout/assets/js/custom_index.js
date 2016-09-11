/* ===================================================
 * custom index js for sliding bg images
 * ========================================================== */
$(document).ready(function(){
    var images = new Array(
        'assets/img/background/1.jpg',
        'assets/img/background/2.jpg',
        'assets/img/background/3.jpg',
        'assets/img/background/4.jpg',
        'assets/img/background/5.jpg'
    );

    var nextimage = 0;
    doSlideshow();

    function doSlideshow(){
        if(nextimage >= images.length) { nextimage = 0; }
        $('#demo-canvas')
        .css('background-image','url("'+images[nextimage++]+'")')
        .fadeIn(5000,function(){
            setTimeout(doSlideshow, 10000);
        });
    }
 });
