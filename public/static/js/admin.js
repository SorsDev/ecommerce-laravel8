
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function(){
	if(route=="product_edit" || route == "product_add"){
		var btn_product_file_image = document.getElementById('btn_product_file_image');
		var product_file_image = document.getElementById('product_file_image');
		btn_product_file_image.addEventListener('click', function(){
			product_file_image.click();
		},false);

		product_file_image.addEventListener('change',function(){
			document.getElementById('form_product_gallery').submit();
		});
	}

	document.getElementsByClassName('lk-'+route)[0].classList.add('active');
	
});