import '../sass/main.scss';

import 'owl.carousel';
import 'owl.carousel/dist/assets/owl.carousel.css';

import '@fancyapps/fancybox';
import '@fancyapps/fancybox/dist/jquery.fancybox.css';

import 'jquery-mask-plugin';

import 'jquery-validation';
import 'jquery-validation/dist/localization/messages_pt_BR';

import 'calc-polyfill/calc.min';
import 'picturefill';

jQuery(document).ready(function($){
	
	
	$('.trigger').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		$('[data-trigger="'+target+'"]').each(function(){
			$(this).toggleClass('active').siblings().removeClass('active');
		});
	});	

	$("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#boxes *").filter(function() {
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	  });

});	