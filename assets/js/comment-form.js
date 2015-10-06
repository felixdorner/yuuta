jQuery(document).ready(function($) {

	"use strict";

	/*--------------------------------------------------------------
	Init empty text area
	--------------------------------------------------------------*/

	function onBlur(el) {
    if (el.value == '') {
        el.value = el.defaultValue;
    }
	}
	function onFocus(el) {
	    if (el.value == el.defaultValue) {
	        el.value = '';
	    }
	}

	/*--------------------------------------------------------------
	Comment form
	--------------------------------------------------------------*/

	$('#commentform-fields').hide(0);

	/* when comment textarea is clicked */
	$('#comment').click(function() {
		$('#commentform-fields').show(0).animate({opacity: 1}, 0);
		$('#cancel-comment').show(0);
		$('#respond').addClass('respond-active');
		$('#comment').addClass('comment-active');
		$('#respond #submit').addClass('submit-active');
		//$(window).scrollTo( '#comment-wrapper', 400, {offset:-70} );
	});

	/* when 'reply' link is clicked */
	$('.comment-reply-link').click(function() {
		$('#commentform-fields').show(0).animate({opacity: 1}, 0);
		$('#cancel-comment-reply-link, #cancel-comment').show(0);
		$('#respond').addClass('respond-active');
		$('#comment').addClass('comment-active');
		$('#respond #submit').addClass('submit-active');
		//$(window).scrollTo( '#comment-wrapper', 400, {offset:-70} );
	});

	/* when comment is cancelled */
	$('#cancel-comment').click(function() {
		$('#commentform-fields').animate({opacity: 0}, 0).hide(0);
		$('#cancel-comment').hide(0);
		$('#respond').removeClass('respond-active');
		$('#comment').removeClass('comment-active');
		$('#respond #submit').removeClass('submit-active');
	});

	/* when comment reply is cancelled */
	$('#cancel-comment-reply-link').click(function() {
		$('#cancel-comment-reply-link').hide(0);
		$('#commentform-fields').show(0).animate({opacity: 1}, 0);
		//$(window).scrollTo( '#comment-wrapper', 400, {offset:-70} );
	});

	/*--------------------------------------------------------------
	Expand textarea
	--------------------------------------------------------------*/

	$( "textarea" ).autogrow();

});