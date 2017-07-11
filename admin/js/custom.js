function checkForm(){
	var name 			= jQuery('#name').val();
	var address_one		= jQuery('#address_one').val();
	var city			= jQuery('#city').val();
	var country 		= jQuery('#country').val();
	
	if(name==""){		
		jQuery('#name').addClass('trainerInputError');
		return false;
	}
	else if(address_one==""){		
		jQuery('#address_one').addClass('trainerInputError');
		return false;
	}
	else if(city==""){		
		jQuery('#city').addClass('trainerInputError');
		return false;
	}
	else if(country==""){		
		jQuery('#country').addClass('trainerInputError');
		return false;
	}
	else{
		return true;
	}
}


function checkForm_edit(){
	var name 			= jQuery('#name').val();
	var address_one		= jQuery('#address_one').val();
	var city 			= jQuery('#city').val();
	var country 		= jQuery('#country').val();
	
	if(name==""){		
		jQuery('#name').addClass('trainerInputError');
		return false;
	}
	else if(address_one==""){		
		jQuery('#address_one').addClass('trainerInputError');
		return false;
	}
	else if(city==""){		
		jQuery('#city').addClass('trainerInputError');
		return false;
	}
	else if(country==""){		
		jQuery('#country').addClass('trainerInputError');
		return false;
	}
	else{
		return true;
	}
	
}

function checkForm_country(){
	var country 		= jQuery('#country').val();
	var image_url		= jQuery('#image_url').val();
	
	if(country==""){		
		jQuery('#country').addClass('trainerInputError');
		return false;
	}
	else if(image_url==""){		
		jQuery('#image_url').addClass('trainerInputError');
		return false;
	}
	else{
		return true;
	}
}