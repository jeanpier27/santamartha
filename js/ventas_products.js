$(document).ready(function(){
	var i=0;
	$('#add_products').submit(function(e){
		e.preventDefault();
		var id_producto=$('#produc').val();
		var producto=$('#produc option:selected').text();
		var valor=$('#valor').val();
		var cantidad=$('#cantidad').val();
		var subt=parseFloat($('#subtotal').text());
		$('input[name=factura_g]').val($('input[name=factura]').val());
		$('input[name=fecha_g]').val($('input[name=fecha]').val());
		$('input[name=cliente_g]').val($('select[name=cliente]').val());
		// var iva=parseFloat($('#iva').text());
		// var total=parseFloat($('#total').text());
		subt=(parseFloat(subt)+(parseFloat(valor)*parseFloat(cantidad))).toFixed(2);
		iva=(0.12*subt).toFixed(2);
		total=(parseFloat(subt)+parseFloat(iva)).toFixed(2);
		i++;
		$('#body_products').append('<tr  id="fila'+i+'"><td><input type="hidden" name="id[]" value="'+id_producto+'">'+i+'</td><td><input type="hidden" name="prod[]" value="'+producto+'">'+producto+'</td><td class="text-right"><input type="hidden" name="valor[]" value="'+valor+'">$ <span id="va'+i+'">'+valor+'</span></td><td class="text-right"><input type="hidden" name="cantidad[]" value="'+cantidad+'"><span id="cant'+i+'">'+cantidad+'</span></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn-remove"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td></tr>');
		
		$('#subtotal').empty();
		$('#subtotal').append(subt);
		$('#iva').empty();
		$('#iva').append(iva);
		$('#total').empty();
		$('#total').append(total);

		$("#produc> option[value='0']").attr("selected",true)
		$("#select2-produc-container").attr("title","Seleccione...");
		$("#select2-produc-container").html("Seleccione...");
		$('#valor').val('');
		$('#disponible').val('');
		$('#cantidad').val('');
		$('#agregar').attr('disabled',true);
		$('#guardar_t').removeAttr('disabled');
		$('input[name=total_g]').val(total);
		$('#descuento').attr('max',subt);
	});

	$(document).on('click','.btn-remove',function(){
		i--;
		if(i==0){
			$('#guardar_t').attr('disabled',true);
		}
		var id_remove=$(this).attr('id');
		// console.log(id_remove);
		var val_p=$('#va'+id_remove+'').text();
		var can=$('#cant'+id_remove+'').text();
		// console.log(val_p);
		// console.log(can);
		var subt=parseFloat($('#subtotal').text());
		subt=(parseFloat(subt)-(parseFloat(val_p)*parseFloat(can))).toFixed(2);
		iva=(0.12*subt).toFixed(2);
		total=(parseFloat(subt)+parseFloat(iva)).toFixed(2);

		$('#subtotal').empty();
		$('#subtotal').append(subt);
		$('#iva').empty();
		$('#iva').append(iva);
		$('#total').empty();
		$('#total').append(total);
		$('input[name=total_g]').val(total);
		$('#descuento').attr('max',subt);
		$('#fila'+id_remove+'').remove();
	});
});