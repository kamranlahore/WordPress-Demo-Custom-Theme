// A $( document ).ready() block.
$( document ).ready(function() {


//Header Shrink Started
var wind_widht = $( window ).width();

function scrollFunction() {
   // alert(1);

    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        //alert(333);
        $('header .logo img').css('max-width', '50%');
        $('.top-menu').css('margin-top', '2vw');
        $('.social-lang ul.social').css('margin-top', '1.5vw');
        $('.social-lang ul.lang').css('margin-top', '2vw');
        $('.social-lang ul.login-signup').css('margin-top', '2vw');

        
    } else {
        $('header .logo img').css('max-width', '100%');
        $('.top-menu').css('margin-top', '50px');
        $('.social-lang ul.social').css('margin-top', '50px');
        $('.social-lang ul.lang').css('margin-top', '60px');
        $('.social-lang ul.login-signup').css('margin-top', '60px');
    
    }
}

$(window).resize(function (){

    if( wind_widht >= 1366){
        window.onscroll = function() {scrollFunction()};
    }    
});

if( wind_widht >= 1366){
    window.onscroll = function() {scrollFunction()};
}

//Header Shrink Started


// ===== Scroll to Top Start ==== 
jQuery(window).scroll(function() {
    //alert(11);
    if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
       // alert(11);
        jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
jQuery('#return-to-top').click(function() {      // When arrow is clicked
    jQuery('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});
// ===== Scroll to Top Start ==== 


});