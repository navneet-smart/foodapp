$(document).ready(function(){
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			pwd2:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Login Validation
	$("#admin_login").validate({
		rules:{
			email:{
				required:true,
			},
			password:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// SweetAlert Delete Start
	$(".deleteRecord").click(function(){
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
			title: 'Are you Sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Delete it!',
			cancelButtonText: 'No, Cancel!',
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger',
			buttonsStyling: false,
			reverseButtons: true
		},
		function(){
			window.location.href = "/public/admin/"+deleteFunction+"/"+id;
		})
	});
	// SweetAlert Delete End

	// Settings Validation Start
	$("#settings").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/public/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				if(resp=="false"){
					$("#check_pwd").html("<font color='#bb0303'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$("#check_pwd").html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				console.log("Error");
			}
		});
	});
	// Settings Validation End

	// Profile Validation
	$("#edit_profile").validate({
		rules:{
			name:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	//Owners Validation
	$("#add_owner").validate({
		rules:{
			name:{
				required:true,
			},
			email:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#email").keyup(function(){
		var email = $("#email").val();
		$.ajax({
			type:'get',
			url:'/public/admin/check-email',
			data:{email:email},
			success:function(resp){
				if(resp=="true"){
					$("#check_email").html("<font color='#bb0303'>Email is Already Registered With Us!</font>");
				}else if(resp=="false"){
					$("#check_email").html("<font color='green'></font>");
				}
			},error:function(){
				console.log("Error");
			}
		});
	});

	$("#edit_owner").validate({
		rules:{
			name:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	//FoodTrucks Validation
	$("#edit_foodTruck").validate({
		rules:{
			display_name:{
				required:true,
			},
			speciality:{
				required:true,
			},
			min_order_value:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Provider Categories
	$("#edit_provider_category").validate({
		rules:{
			category:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Sponsers Validation
	$("#add_sponser").validate({
		rules:{
			display_name:{
				required:true,
			},
			image:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#display_name").keyup(function(){
		var display_name = $("#display_name").val();
		$.ajax({
			type:'get',
			url:'/public/admin/check-sponser',
			data:{display_name:display_name},
			success:function(resp){
				if(resp=="true"){
					$("#check_display_name").html("<font color='#bb0303'>Sponser is Already Exist!</font>");
				}else if(resp=="false"){
					$("#check_display_name").html("<font color='green'></font>");
				}
			},error:function(){
				console.log("Error");
			}
		});
	});

	$("#edit_sponser").validate({
		rules:{
			display_name:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	//Product Validation
	$("#edit_product").validate({
		rules:{
			name:{
				required:true,
			},
			display_name:{
				required:true,
			},
			description:{
				required:true,
			},
			size_and_price:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	//Category Validation
	$("#add_category").validate({
		rules:{
			category:{
				required:true,
			},
			image:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#category").keyup(function(){
		var category = $("#category").val();
		$.ajax({
			type:'get',
			url:'/public/admin/check-category',
			data:{category:category},
			success:function(resp){
				if(resp=="true"){
					$("#check_category").html("<font color='#bb0303'>Category is Already Exist!</font>");
				}else if(resp=="false"){
					$("#check_category").html("<font color='green'></font>");
				}
			},error:function(){
				console.log("Error");
			}
		});
	});

	$("#edit_category").validate({
		rules:{
			category:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Delivery Boy Validation
	$("#add_deliveryBoy").validate({
		rules:{
			name:{
				required:true,
			},
			email:{
				required:true,
			},
			contact:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#edit_deliveryBoy").validate({
		rules:{
			name:{
				required:true,
			},
			contact:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});