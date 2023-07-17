import { Tooltip, Toast,Modal,Offcanvas} from 'bootstrap';
import $ from "jquery";
let btnMiniShop = document.querySelector("#btn-minishop");

document.addEventListener('DOMContentLoaded', function () {
	const miniShopOffCanvas = new Offcanvas('#miniShopOffCanvas');
	btnMiniShop.addEventListener('click', ()=>{  
		miniShopOffCanvas.show();
	});
});

jQuery(document).ready(function($){
	var url = window.location.href;
	url = url.split("/");
	url = url[url.length-2];

    console.log(url)
	if(url == "login") {
		$("#customer_login .login-register__register-container ").addClass('d-none'); //Remove Registration Div
	}
	if(url == "register") {
		$("#customer_login .login-register__login-container").addClass('d-none'); // Remove Login Div
	}
})

$(document).ready(function() {
    console.log('pricing simulator page')
    //pageTransitionBooking();
    $('.spinner-input .btn-spiner').click(function () {
        console.log('test')
        var $input = $(this).parents('.spinner-input').find('input.spinner-input__input');
        console.log($input);
        if($(this).hasClass('minus')) {
            var count = parseFloat($input.val()) - 1;
            count = count < 1 ? 1 : count;
            if (count < 2) {
                $(this).addClass('dis');
            }
            else {
                $(this).removeClass('dis');
            }
            $input.val(count);
        }else {
            var count = parseFloat($input.val()) + 1
            $input.val(count);
            if (count > 1) {
                $(this).parents('.spinner').find(('.minus')).removeClass('dis');
            }
        }
        $input.change();
        return false;
    });
});

( function ( $ ) {
 "use strict";
// Define the PHP function to call from here
 var data = {
   'action': 'mode_theme_update_mini_cart'
 };
 $.post(
   woocommerce_params.ajax_url, // The AJAX URL
   data, // Send our PHP function
   function(response){
     $('#mode-mini-cart').html(response); // Repopulate the specific element with the new content
   }
 );
// Close anon function.
}( jQuery ) );





