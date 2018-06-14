$(document).ready(function(){
	$('#servicio').change(function(){
		var serv=$(this).val();
		if(serv==='Lavada de carro'){
			$('#c_carro').css('display','block');
		}else{
			$('#c_carro').css('display','none');
		}
	});
});