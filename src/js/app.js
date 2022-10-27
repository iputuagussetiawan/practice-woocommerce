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
		$("#customer_login .u-column2").remove(); //Remove Registration Div
	}
	if(url == "register") {
		$("#customer_login .u-column1").remove(); // Remove Login Div
	}
})



