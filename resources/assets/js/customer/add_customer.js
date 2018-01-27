var stt_name_input_tel = 0;
var stt_name_slect_tel = 0;

var stt_name_input_email = 0;
var stt_name_slect_email = 0;

var stt_name_input_address = 0;
var stt_name_slect_address = 0;


jQuery(document).ready(function($) {
	//Telephone add
	$('#telephone .icon_circle').on('click',function(){
		stt_name_input_tel += 1;
		stt_name_slect_tel += 1;
		var name_tel = 'txtname_tel'+stt_name_input_tel;
		var name_select = 'name_select'+stt_name_slect_tel;

		add_html('telephone',name_tel,name_select);
		$(this).closest('.class_root').find('.flag_block').addClass('icon_circletop');
		$.getScript("../../assets/js/customer/test.js");
	});
	//regex telephone
	$("#telephone input").keyup(function(){
	    var val = $(this).val();
	    //console.log($('#telephone input')[0]);

	    if(test_regex(val,null)==true && val.length >= 9 && val.length <= 11){
	    	$(this).closest('.class_root').find('.flag_block').removeClass('icon_circletop');
	    }
	    else if(test_regex(val,null)==false){
		    	$(this).addClass('error_red').closest('.class_root').find('.flag_block').addClass('icon_circletop');
		    }
	    	else if(test_regex(val,null)==true){
		    	$(this).removeClass('error_red');
		    }
	});

	//Email add
	$('#email .icon_circle').on('click',function(){
		stt_name_input_email += 1;
		stt_name_slect_email += 1;
		var name_email_input = 'inputname_email'+stt_name_input_email;
		var name_email_select = 'slectname_email'+stt_name_slect_email;
		add_html('email',name_email_input,name_email_select);
		$(this).closest('.class_root').find('.flag_block').addClass('icon_circletop');
		$.getScript("../../assets/js/customer/test.js");
	});
	//regex email
	$("#email input").keyup(function(){
	    var val = $(this).val();
	    if(test_regex(null,val)==true){
	    	$(this).closest('.class_root').find('.flag_block').removeClass('icon_circletop');

	    }else{
	    	$(this).closest('.class_root').find('.flag_block').addClass('icon_circletop');

	    }
	});

    //Address add
    $('#address .icon_circle').on('click',function(){
        stt_name_input_address += 1;
        stt_name_slect_address += 1;
        var name_email_input = 'inputname_email'+stt_name_input_address;
        var name_email_select = 'slectname_email'+stt_name_slect_address;
        add_html('address',name_email_input,name_email_select);
        $(this).closest('.class_root').find('.flag_block').addClass('icon_circletop');
        $.getScript("../../assets/js/customer/test.js");
    });
    //regex address
    $("#address input").keyup(function(){
        var val = $(this).val();
        if(test_regex(null,null,val)==true){
            $(this).closest('.class_root').find('.flag_block').removeClass('icon_circletop');

        }else{
            $(this).closest('.class_root').find('.flag_block').addClass('icon_circletop');
        }
    });
	
	//Test get value data_add
	$('.btn_save').on('click', function(event) {
		event.preventDefault();

        var detail_info = {};
        var data_add = {};
        var customers = {};
        var users ={};
        var detail_address = {};

		//Start (detail_info)telephone and email
		var contentkv=[];
		$('#telephone > div').each(function(i,v){
		 	var val = $(this).find('input').val();
		 	var key = $(this).find('select option:selected').val();
		 	var json_tel = {'type':'phone','key':key,'value':val};
		 	contentkv.push(json_tel);
		});
		$('#email > div').each(function(i,v){
		 	var val = $(this).find('input').val();
		 	var key = $(this).find('select option:selected').val();
		 	var json_email = {'type':'email','key':key,'value':val};
		 	contentkv.push(json_email);
		});


        detail_info.info = contentkv;

        detail_info.company_id = 1;
		//End (detail_info)telephone and email

		//Start Address
		var content_address = [];
        $('#address > div').each(function(i,v){
        	var  district = $('select[name=district] option:checked').val();
            var  city = $('select[name=city] option:checked').val();
            var  country = $('select[name=country] option:checked').val();
            var val = $(this).find('input').val();
            var key = $(this).find('select option:selected').val();
            var json_address = {'key':key,'address':val,'district_id':district,'city_id':city,'country_id':country};
            content_address.push(json_address);
        });
        detail_address.address = content_address;
        //detail_address.customers_id = 1;
        detail_address.company_id = 1;
		//End Address

		//Start Customer
        customers.first_name = $('input[name=txt_firtname]').val();
        customers.last_name = $('input[name=txt_lastname]').val();
        customers.birthday =  '1965-1-1';//$('input[name=txt_birthday]').val();
        customers.gender = $('select[name=txt_sex] option:checked').val();
        customers.card_id = $('input[name=txt_cmnd]').val();
        customers.position = $('input[name=txt_position]').val();
        customers.status = 1;
        customers.content = "Đang test";
        //customers.user_id = 2;
        customers.admin_id = localStorage.getItem('user_id');
        customers.career_id = $('select[name=txt_career] option:checked').val();
        customers.customer_channel_id = $('select[name=txt_customer] option:checked').val();
        customers.company_id = 1;
		//End Customer

		//Start User
		users.name = "AAA";
        users.email = $('#new_email').val();
        users.password = $('#new_pass').val();
        users.level = 3;
        users.status = 1;
        users.department_id = 1;
		//End User

        data_add.customers = customers;
        data_add.detail_address = detail_address;
        data_add.users = users;
		data_add.detail_info = detail_info;
        console.log(data_add);

        var token = localStorage.getItem("token");
        token = 'Bearer '+token;
        $.ajax({
            url : 'http://crm.dev-altamedia.com/api/customer/signup',
            type : 'POST',
            headers : {'Authorization': token},
			data:data_add,
            success: function(data){
                console.log(data);
            },
            error   : function(jqXHR,status, errorThrown){
                my_error(jqXHR.status);
            }
        });
	});

	//	chon loai khach hang
	$( "#chose_role" ).change(function() {

	    var val = $( "select option:selected" ).val();
	    if( val == 1){
	    	$('.flag-hidden').css("display","block");
	    	$('#infocompanny').css('display','none');
	    }
	    else if(val == 2){
	    	$('#infocompanny').css('display','block');
	    	$('.flag-hidden').css('display','none');
	    }    
	});


	//Test login
    var token = localStorage.getItem("token");
    if(token!==null){
        token = 'Bearer '+token;
        $.ajax({
            url: 'http://crm.dev-altamedia.com/api/country/country',
            type: 'GET',
            headers : {'Authorization': token},
            success: function(data){
                // console.log(data);
                var html ="";
                $.each(data,function(k,v){
                    html += '<option value="'+v.id+'">'+v.name+'</option>';
                });
                $('select[name=country]').append(html);
            },
            error   : function(jqXHR,status, errorThrown){
                my_error(jqXHR.status);
            }
        });

        $.ajax({
            url: 'http://crm.dev-altamedia.com/api/city/city/1',
            type: 'GET',
            headers : {'Authorization': token},
            success: function(data){
                //console.log(data);
                var html ="";
                $.each(data,function(k,v){
                    html += '<option value="'+v.id+'">'+v.name+'</option>';
                });
                $('select[name=city]').append(html);
            },



            error   : function(jqXHR,status, errorThrown){
                my_error(jqXHR.status);
            }
        });

        $.ajax({
            url: 'http://crm.dev-altamedia.com/api/customer_channel/customer_channel',
            type: 'GET',
            headers : {'Authorization': token},
            success: function(data){
                //console.log(data);
                var html ="";
                $.each(data,function(k,v){
                    html += '<option value="'+v.id+'">'+v.name+'</option>';
                });
                $('select[name=txt_customer]').append(html);
            },



            error   : function(jqXHR,status, errorThrown){
                my_error(jqXHR.status);
            }
        });

        $.ajax({
            url: 'http://crm.dev-altamedia.com/api/career/career',
            type: 'GET',
            headers : {'Authorization': token},
            success: function(data){
                var html ="";
                $.each(data,function(k,v){
                    html += '<option value="'+v.id+'">'+v.name+'</option>';
                });
                $('select[name=txt_career]').append(html);
            },



            error   : function(jqXHR,status, errorThrown){
                my_error(jqXHR.status);
            }
        });


        $.ajax({
            url: 'http://crm.dev-altamedia.com/api/user/me',
            type: 'GET',
            headers : {'Authorization': token},
            success: function(data){
                localStorage.setItem("user_id",data.id);
                // localStorage.setItem("user_name",data.name);
                // localStorage.setItem("user_email",data.email);
                // localStorage.setItem("user_level",data.level);
                // localStorage.setItem("user_password",data.password);
                // localStorage.setItem("user_status",data.status);
                // localStorage.setItem("user_department_id",data.department_id);

            },



            error   : function(jqXHR,status, errorThrown){
                my_error(jqXHR.status);
            }
        });




    }
    else{
        window.location.href = 'http://localhost/AdminLTE-master/pages/forms/login.html';
    }
});

//City Change
$( "select[name=city]" ).change(function() {
	var id = $( "select[name=city] option:selected" ).val();
    //var token = localStorage.getItem("token");
    //token = 'Bearer '+token;
    $.ajax({
        url: 'http://crm.dev-altamedia.com/api/district/district/'+id,
        type: 'GET',
        //headers : {'Authorization': token},
        success: function(data){
        	console.log(data);
            var html ="";
            $.each(data,function(k,v){
                html += '<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('select[name=district]').html(html);
        },



        error   : function(jqXHR,status, errorThrown){
            my_error(jqXHR.status);
        }
    });
});

//id cha append
function add_html(id,input_name,slect_name){
	var name_sel = $('#'+id+' select:first').attr('name')
	var sl = $('#'+id+' select:first').prop('outerHTML');
	var str=sl.replace('name="'+name_sel+'"','name="'+slect_name+'"');
	var str_html = '<div class="col-xs-12 parent-delete"><div class="col-xs-3 padd_r"><div class="form-group">'+str+'</div></div><div class="col-xs-6 padd_l"><div class="form-group"><input type="text" name="'+input_name+'" class="form-control" placeholder=""></div><span class="spanicon deleteicon"><i class="fa fa-minus-circle"></i></span></div></div></div>';
	$('#'+id+'').append(str_html);
}

function test_regex(txtPhone=null,txtEmail=null,txtAddress=null){

	if(txtPhone != null){
		var filter = /^[0-9-+]+$/;

	    if (filter.test(txtPhone))  {
	        return true;
	    }
	    else {
	        return false;
	    }

	}else if(txtEmail != null){
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

	    if (filter.test(txtEmail))  {
	        return true;
	    }
	    else {
	        return false;
	    }
	}else if(txtAddress != null) {
			return true;
		}
		else {
			return false;
		}

}

function my_error(error){
    switch(error) {
        case 400:
            var text = "Bad Request - Request không hợp lệ hoặc bị lỗi khi trao đổi dữ liệu với trình duyệt.";
            break;
        case 401:
            var text = "Unauthorized - Access Token của bạn hết hạn hoặc không hợp lệ.";
            break;
        case 403:
            var text = "Forbidden - Bạn không được quyền truy cập tài nguyên ngày('email hoặc password không hợp lệ').";
            break;
        case 404:
            var text = "Not Found - Tài nguyên bạn muốn truy xuất không tồn tại hoặc đã bị xóa.";
            break;
        case 405:
            var text = "Method Not Allowed - Đường dẫn bạn truy cập không tồn tại.";
            break;
        case 422:
            var text = "Unprocessable Entity - Dữ liệu của bạn gửi lên không hợp lệ hoặc bị lỗi.";
            break;
        case 429:
            var text = "Too Many Requests - Bạn gửi request quá nhanh và đã bị giới hạn truy cập.";
            break;
        case 500:
            var text = "Internal Server Error - Hệ thống Server của Teamcrop đang có vấn đề hoặc không truy cập được.";
            break;
        case 503:
            var text = "Service Unavailable - Hệ thống tạm thời không truy cập được, có thể là chúng tôi đang bảo trì hoăc bị sự cố. Hãy vui lòng thử lại sau.";
            break;
    }

    return console.log(text);
}
