require('jquery');
require('console');
(function($, window, document, undefined) {
	$(function() {
		console.log('jQuery,Boostrap and Modernizr loaded');
	});
	$(document).ready(function(){
		$(".loader").fadeOut("slow");
	})
})(jQuery, window, document);
