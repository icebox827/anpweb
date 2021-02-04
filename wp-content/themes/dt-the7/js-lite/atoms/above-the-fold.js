var dtGlobals = {};

dtGlobals.isMobile	= (/(Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|windows phone)/.test(navigator.userAgent));
dtGlobals.isAndroid	= (/(Android)/.test(navigator.userAgent));
dtGlobals.isiOS		= (/(iPhone|iPod|iPad)/.test(navigator.userAgent));
dtGlobals.isiPhone	= (/(iPhone|iPod)/.test(navigator.userAgent));
dtGlobals.isiPad	= (/(iPad)/.test(navigator.userAgent));
/*dtGlobals.isBuggy	= (navigator.userAgent.match(/AppleWebKit/) && typeof window.ontouchstart === 'undefined' && ! navigator.userAgent.match(/Chrome/));*/
dtGlobals.winScrollTop = 0;
window.onscroll = function() {
	dtGlobals.winScrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
};

dtGlobals.isWindowsPhone = navigator.userAgent.match(/IEMobile/i);

/*dtGlobals.customColor = 'red';*/
document.documentElement.className += " mobile-" + (dtGlobals.isMobile);

dtGlobals.logoURL = false;
dtGlobals.logoH = false;
dtGlobals.logoW = false;


jQuery(document).ready(function($) {
    var html = document.getElementsByTagName( 'html' )[0],
        body = document.body;

    // iOS sniffing.
    if (dtGlobals.isiOS) {
        html.classList.add("is-iOS");
    }
    else {
        html.classList.add("not-iOS");
    }

    /*--Detect safari browser*/
    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
        body.classList.add("is-safari");
    }

    // windows-phone sniffing
    if (dtGlobals.isWindowsPhone){
        body.classList.add("ie-mobile");
        body.classList.add("windows-phone");
    }
    // if not mobile device
    if(!dtGlobals.isMobile){
        body.classList.add("no-mobile");
    }
    // iphone
    if(dtGlobals.isiPhone){
        body.classList.add("is-iphone");
    }

    dtGlobals.isPhone = false;
    dtGlobals.isTablet = false;
    dtGlobals.isDesktop = false;

    if (dtGlobals.isMobile){
        var size = window.getComputedStyle(document.body,":after").getPropertyValue("content");
        if (size.indexOf("phone") !=-1) {
            dtGlobals.isPhone = true;
        }
        else if (size.indexOf("tablet") !=-1) {
            dtGlobals.isTablet = true;
        }
    }
    else {
        dtGlobals.isDesktop = true;
    }

    $(window).on("the7_widget_resize", function( event ) {
        /*Detect first/last visible item microwidgets*/
        $(".mini-widgets, .mobile-mini-widgets").find(" > *").removeClass("first last");
        $(".mini-widgets, .mobile-mini-widgets").find(" > *:visible:first").addClass("first");
        $(".mini-widgets, .mobile-mini-widgets").find(" > *:visible:last").addClass("last");
    }).trigger( "the7_widget_resize" );
});

