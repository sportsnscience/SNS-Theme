


jQuery(document).ready(function() {
	inputWatermark(); 					//initialize input watermarks
});


/* =====================================================================
HEADER INPUT WATERMARKS
======================================================================= */

function inputWatermark() {
	/* on page load, add watermark if no content in input */
	jQuery( "#search" ).each(function( index ) {
		if (jQuery(this).val().length == 0) {
			jQuery(this).addClass("watermark");
		 }else{
			jQuery(this).removeClass("watermark");
		 }
	});

	/* on input focus remove watermark */
	jQuery("#search").on("focus", function(event){	
		jQuery(this).removeClass("watermark");
	});
	
	/* on input blur, add or remove watermark based on content */
	jQuery("#search").on("blur", function(event){
		  if (jQuery(this).val().length == 0) {
			jQuery(this).addClass("watermark");
		  }else{
			jQuery(this).removeClass("watermark");
		 }
	});
}


/* =====================================================================
HEADER NAVIGATION
======================================================================= */

jQuery(document).ready(function() {

	var sw = document.body.clientWidth;

	
		if (sw > 767) {
			// adjust menus based on screen size
			jQuery('.main-headline').css('background','0');

			jQuery('ul.sub-menu').hover(function() {
				//jQuery(this).parent().css('background','#333');
			}, function() {
				//jQuery(this).parent().css('background','#000');
			})

		}


	jQuery('ul.sub-menu ul').parent().css('padding-bottom','0');
		
	// add the bottom-sub-menu class to the bottom sub-menu UL's
	//jQuery('#bottom-nav').find('.top-sub-menu').addClass('bottom-sub-menu').removeClass('top-sub-menu');

	jQuery('#top-nav').find('.sub-menu').addClass('top-sub-menu');
	jQuery('#bottom-nav').find('.sub-menu').addClass('bottom-sub-menu');

	jQuery('.sub-menu').find('a').unwrap();

	// remove the anchor tags from top level navigation for full screen view
	jQuery('.disable-href > h3 > a').contents().unwrap();
	jQuery('.disable-href > a').contents().unwrap();	
	

	jQuery('.site-content').css('background','#fff');



	//check for screen resizing
	jQuery(window).resize(function() {
		
		sw = document.body.clientWidth;
		if (sw > 767) {
			// adjust menus based on screen size
			jQuery('.main-headline').css('background','0');
		}
		if (sw > 950) {
			// adjust menus based on screen size
			jQuery('.top-menu').show();
			jQuery('.bottom-menu').show();
			jQuery('.bottom-sub-menu').show();
			jQuery('ul.top-menu li h3').css('background','transparent');
			jQuery('ul.bottom-menu li h3').css('background','transparent');
		}
		else {
			jQuery('.top-menu').hide();
			jQuery('.bottom-menu').hide();
			jQuery('.bottom-sub-menu').hide();
			jQuery('ul.top-menu li h3').css('background','url(/wp-content/themes/umc2014/images/global/arrow_left.png) right no-repeat');	
			jQuery('ul.bottom-menu li h3').css('background','url(/wp-content/themes/umc2014/images/global/arrow_left.png) right no-repeat');		
		}
		

	});


	// toggle submenu items
	jQuery('ul.menu-trigger li').click(function(){

		var menu = jQuery(this).parent().attr('rel');  
		
		var sw = document.body.clientWidth;
		//console.log(sw);
		//console.log(menu);

		if ((sw > 950)&&(menu=='bottom')) {
			// disable sub-nav click on the footer for desktop view
		}
		
		else {	

			// remove active nav state if already active
			if (jQuery(this).hasClass('selected')) {
				jQuery(this).removeClass('selected');
				jQuery(this).find('ul').fadeToggle('fast');
				if (sw < 950) {
					jQuery(this).find('h3').css('background','url(/wp-content/themes/umc2014/images/global/arrow_left.png) right no-repeat');
				}
			}	

			// reset any active nav and activate selected nav	
			else {
				jQuery('.' + menu + '-sub-menu').fadeOut('fast');
				jQuery('ul.' + menu + '-menu li').removeClass('selected');
				jQuery(this).find('ul').fadeToggle('fast');
				jQuery(this).addClass('selected');
				if (sw < 950) {
					jQuery('ul.' + menu + '-menu li h3').css('background','url(/wp-content/themes/umc2014/images/global/arrow_left.png) right no-repeat');
					jQuery(this).find('h3').css('background','url(/wp-content/themes/umc2014/images/global/arrow_down.png) right no-repeat');
				}			
			}

		}
	});

	// toggle mobile navigation
	jQuery('.mobile-menu-trigger').click(function() {

		var menu = jQuery(this).attr('rel');

		jQuery('.' + menu + '-sub-menu').fadeOut();
		jQuery('.' + menu + '-menu li').removeClass('selected');
		jQuery('#' + menu + '-nav ul.' + menu + '-menu').fadeToggle('fast');
		if (sw < 950) {
			jQuery('ul.' + menu + '-menu li h3').css('background','url(/wp-content/themes/umc2014/images/global/arrow_left.png) right no-repeat');
			jQuery(this).find('h3').css('background','url(/wp-content/themes/umc2014/images/global/arrow_down.png) right no-repeat');
		}		
	});


	// close drop down menu when clicked outside the menu area
	jQuery('html').click(function() {
	  jQuery('.top-sub-menu').hide();
	  jQuery('.top-menu li').removeClass('selected');
	});

	jQuery('.top-menu').click(function(event){
	    event.stopPropagation();
	});	

	jQuery('#utah-logo').click(function() {
		window.location.href = 'http://www.utah.edu';
	});	



	// accordian functionality

	jQuery('dt').click(function() {
		if (jQuery(this).hasClass('accordian-expanded')) {
			jQuery(this).next().slideUp();
			jQuery(this).removeClass('accordian-expanded');
		}
		else {
			jQuery(this).next().slideDown();
			jQuery(this).addClass('accordian-expanded');
		}
	});


	
});

jQuery(window).load(function() {
  jQuery('.flexslider').flexslider({
    animation: "fade"
  });
});

