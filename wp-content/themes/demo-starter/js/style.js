/* global wp, jQuery */
/**
 * JS script for style
 */

 ( function( $ ) {

	$(window).on("scroll", function () {
		var scroll = $(window).scrollTop();
	
		if (scroll >= 80) {
		  $("#masthead").addClass("nav-fixed");
		} else {
		  $("#masthead").removeClass("nav-fixed");
		}
	  });
	
	  //Main navigation Active Class Add Remove
	  $(".navbar-toggler").on("click", function () {
		$("header").toggleClass("active");
	  });
	  $(document).on("ready", function () {
		if ($(window).width() > 991) {
		  $("header").removeClass("active");
		}
		$(window).on("resize", function () {
		  if ($(window).width() > 991) {
			$("header").removeClass("active");
		  }
		});
	  });
	
}( jQuery ) );
