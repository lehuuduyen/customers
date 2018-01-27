//telephone
$("#telephone input").keyup(function(){
	   var val = $(this).val();
	    if(test_regex(val)==true && val.length >= 9 && val.length <= 11){
	    	$(this).closest('.class_root').find('.flag_block').removeClass('icon_circletop');
	    }else {

	    	$(this).closest('.class_root').find('.flag_block').addClass('icon_circletop');
	    }
	}); 

$('.deleteicon').on('click', function(event) {
		event.preventDefault();
		$(this).closest('.class_root').find('.flag_block').removeClass('icon_circletop');
		$(this).closest('.parent-delete').remove();
	});


//email
$("#email input").keyup(function(){
	    var val = $(this).val();
	    if(test_regex(null,val)==true){
	    	$(this).closest('.class_root').find('.flag_block').removeClass('icon_circletop');
	    }else{
	    	$(this).closest('.class_root').find('.flag_block').addClass('icon_circletop');
	    }
	});

//address
//regex address
$("#address input").keyup(function(){
    var val = $(this).val();
    if(test_regex(null,null,val)==true){
        $(this).closest('.class_root').find('.flag_block').removeClass('icon_circletop');

    }else{
        $(this).closest('.class_root').find('.flag_block').addClass('icon_circletop');
    }
});