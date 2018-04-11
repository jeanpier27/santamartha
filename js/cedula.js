$('#cedula').focusout(function(){
	var cedula=$(this).val();
                        
                        if (cedula!=""){
                            
                            var a=[10];
                            var b=[10];
                            var total=0;
                            for(var i=0;i<10;i++){
                                a[i]=cedula.charAt(i);
                                if((i%2)==1){
                                  b[i]=a[i];

                                  }else{
                                      if((a[i]*2)>=10){
                                        b[i]=(a[i]*2)-9;
                                        }else{
                                            b[i]=a[i]*2;
                                        }
                                  }

                              }

	                        for(var i=0;i<9;i++){
	                            total=parseInt(b[i])+parseInt(total);
	                        }
	                        var verificar=10-(total%10);

	                        if(verificar==a[9] || verificar==10){
	                            console.log('ok');
	                            
	                            $('#message_cedula').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>ok!</strong> Cedula valida.  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
	                            setTimeout(function() {
	                        		$('#message_cedula').html('');
						          }, 4000);
	                        }else{
	                        	console.log('error');
	                        	$('#registro').trigger("reset");
	                        	
	                        	$('#message_cedula').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>error!</strong> Cedula invalida.  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
	                        	setTimeout(function() {
	                        		$('#message_cedula').html('');
						          }, 4000);
	                        }
	                    }else{
	                    	console.log('error');
	                    }
});