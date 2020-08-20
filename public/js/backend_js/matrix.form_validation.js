
$(document).ready(function(){
	$("#access").hide();
	$("#type").change(function(){
		var type = $("#type").val();
		if(type == "Admin"){
			$("#access").hide();
		}else{
			$("#access").show();
		}
	})
	
    $("#new_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'http://localhost:8888/tsod_population_db/public/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				// alert(typeof resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
				   }
			},error:function(){
				console.log("Error");
			}
		});  	
    });
	
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

	//Add Profile Validation
    $("#add_profile").validate({
		rules:{
			person_name:{
				required:true
			},
			gender:{
				required:true
			},
			dob:{
				required:true
			},
			fname:{
				required:true,
			},
			mname:{
				required:true,
			},
			gbno:{
				required:true,
			},
			rcno:{
				required:true,
			},
			passportno:{
				required:true
			},
			image:{
				required:true
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

    //Edit Profile Validation
    $("#edit_profile").validate({
		rules:{
			person_name:{
				required:true
			},
			gender:{
				required:true
			},
			dob:{
				required:true
			},
			fname:{
				required:true,
			},
			mname:{
				required:true,
			},
			gbno:{
				required:true,
			},
			rcno:{
				required:true,
			},
			passportno:{
				required:true
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

    //Add Occupation Validation
    $("#add_occupation").validate({
		rules:{
			occupation_name:{
				required:true
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

	// Edit Occupation Validation
    $("#edit_occupation").validate({
		rules:{
			occupation_name:{
				required:true
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

	//Add Sponsorship Validation
    $("#add_sponsorship").validate({
		rules:{
			sponsorship_name:{
				required:true
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
	
	//Add Settlement Validation
    $("#add_settlement").validate({
		rules:{
			settlement_name:{
				required:true
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

	$("#delOccupation").click(function(){
		// alert ("test");
		if(confirm('Are you sure you want to delete this Occupation')){
			return true;
		}
		return false;
	});

	$(document).on('click','.deleteRecord',function(e){
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
			title: "Are you sure?",
			  text: "Your will not be able to recover this imaginary file!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Yes, delete it!",
			  closeOnConfirm: false
		},
		function(){
			window.location.href="/tsod_population_db/public/admin/"+deleteFunction+"/"+id;
		});
	});
});
