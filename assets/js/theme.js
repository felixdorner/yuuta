jQuery(document).ready(function($) {

	"use strict";

	/*--------------------------------------------------------------
	Navigation
	--------------------------------------------------------------*/

	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var MQL = 1170;

	//primary navigation slide-in effect
	if($(window).width() > MQL) {
		var headerHeight = $('.site-header').height();
		$(window).on('scroll',
		{
	        previousTop: 0
	    },
	    function () {
		    var currentTop = $(window).scrollTop();
		    //check if user is scrolling up
		    if (currentTop < this.previousTop ) {
		    	//if scrolling up...
		    	if (currentTop > 0 && $('.site-header').hasClass('is-fixed')) {
		    		$('.site-header').addClass('is-visible');
		    	} else {
		    		$('.site-header').removeClass('is-visible is-fixed');
		    	}
		    } else {
		    	//if scrolling down...
		    	$('.site-header').removeClass('is-visible');
		    	if( currentTop > headerHeight && !$('.site-header').hasClass('is-fixed')) $('.site-header').addClass('is-fixed');
		    }
		    this.previousTop = currentTop;
		});
	}

	//open/close primary navigation
	$('.primary-nav-trigger').on('click', function(){
		$('.menu-icon').toggleClass('is-clicked');
		$('.site-header').toggleClass('menu-is-open');

		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('.site-navigation-wrapper').hasClass('is-visible') ) {
			$('.site-navigation-wrapper').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').removeClass('overflow-hidden');
			});
		} else {
			$('.site-navigation-wrapper').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').addClass('overflow-hidden');
			});
		}
	});

  // Uncomment to close the overlay navigation on click of a menu item
  // $( '.site-navigation-wrapper .menu-item a' ).on('click', function() {
	// 	$('.site-navigation-wrapper').removeClass( 'is-visible' );
	// 	$('site-header').toggleClass('menu-is-open');
	// 	$('.menu-icon').toggleClass('is-clicked');
	// });

	/*--------------------------------------------------------------
	Posts background toggle
	--------------------------------------------------------------*/

	$(".bg-control").removeClass('active');
  $(".hentry__inside").removeClass('active');
  $(".overlay").removeClass('active');
	$(".bg-control").click(function() {
		$(this).parent().children(".bg-control").toggleClass('active');
		$(this).parent().children(".hentry__inside").toggleClass('active');
		$(this).parent().children(".overlay").toggleClass('active');
	});

	/*--------------------------------------------------------------
	Gallery masonry init
	--------------------------------------------------------------*/

	var galleries = document.querySelectorAll('.gallery');
	for ( var i=0, len = galleries.length; i < len; i++ ) {
	  var gallery = galleries[i];
	  initMasonry( gallery );
	}
	function initMasonry( container ) {
	  var imgLoad = imagesLoaded( container, function() {
	    new Masonry( container, {
	      itemSelector: '.gallery-item',
	      columnWidth: '.gallery-item'
	    });
	  });
	}

	/*--------------------------------------------------------------
	Image lightbox init
	--------------------------------------------------------------*/

	$(".entry-content a").attr('data-imagelightbox', '');

  // Activity Indicator
	var activityIndicatorOn = function() {
		$( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
	},
	activityIndicatorOff = function() {
		$( '#imagelightbox-loading' ).remove();
	},
	// Overlay
	overlayOn = function() {
		$( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );
	},
	overlayOff = function() {
		$( '#imagelightbox-overlay' ).remove();
	}

	// Init with Overlay
	// $( 'a[data-imagelightbox]' ).imageLightbox({
	// 	onStart: 	 function() { overlayOn(); },
	// 	onEnd:	 	 function() { overlayOff(); }
	// });

  $( 'a[data-imagelightbox]' ).imageLightbox({
		onStart: 	 function() { overlayOn(); },
		onEnd:	 	 function() { overlayOff(); activityIndicatorOff(); },
		onLoadStart: function() { activityIndicatorOn(); },
		onLoadEnd:	 function() { activityIndicatorOff(); }
	});

	/*--------------------------------------------------------------
	Search toggle
	--------------------------------------------------------------*/

	/* show/hide search form via search icon */
	$('.site-header .search-trigger').click(function(){
		if( $('.site-header .search-form').hasClass('search-form--active') )
		{
			/* hide search field */
			$('.site-header .search-form').removeClass('search-form--active');
			return false;
		}
		else
		{
			/* show search field */
			$('.site-header .search-form').addClass('search-form--active');
			/* focus search field */
			$('.site-header .search-field').focus();
			return false;
		}
	});

	/* show/hide search form via search icon */
	$('.site-header .search-trigger').click(function(){
		if( $('.site-header .search-trigger').hasClass('search-form--active') )
		{
			/* hide search field */
			$('.site-header .search-trigger').removeClass('search-form--active');
			return false;
		}
		else
		{
			/* show search field */
			$('.site-header .search-trigger').addClass('search-form--active');
			return false;
		}
	});

	/*--------------------------------------------------------------
	Skip link focus
	--------------------------------------------------------------*/

	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}

});
