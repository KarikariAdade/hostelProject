$(document).ready(function (){
	$('.agent_sign_up_form').submit(function(e){
		e.preventDefault();
		var agent_sign_up_error = $('#agent-sign-up-error');
		var agent_full_name = $('#agent_full_name').val();
		var agent_phone = $('#agent_phone').val();
		var agent_email = $('#agent_email').val();
		var agent_password = $('#agent_password').val();
		var agent_sign_up_btn = $('#agent_sign_up_btn').val();
		$.ajax({
			url: 'includes/agent-sign-up.php',
			method: 'POST',
			data: {
				agent_full_name: agent_full_name,
				agent_phone: agent_phone,
				agent_email: agent_email,
				agent_password: agent_password,
				agent_sign_up_btn: agent_sign_up_btn
			},
			success:function (data){
				agent_sign_up_error.fadeIn(500);
				agent_sign_up_error.html(data);
			},
			error: function (){
				alert("There is an error");
			}
		});
	});

	$('.agent_login_form').submit(function (e){
		e.preventDefault();
		var agent_login_email = $('#agent_login_email').val();
		var agent_login_password = $('#agent_login_password').val();
		var agent_login_btn = $('#agent_login_btn').val();
		$.ajax({
			url: 'includes/agent-sign-up.php',
			method: 'POST',
			data: {
				agent_login_email: agent_login_email,
				agent_login_password: agent_login_password,
				agent_login_btn: agent_login_btn
			},
			success: function(data){
				$('#agent_login_error').fadeIn(500);
				$('#agent_login_error').html(data);
			},
			error:function(){
				alert('There is an error');
			}
		});
	});
	$('.hostel-manager-contact').submit(function (e){
		e.preventDefault();
		var full_name = $('#full_name').val();
		var email_address = $('#email_address').val();
		var phone = $('#phone').val();
		var user_message = $('#user_message').val();
		var manager_id = $('#manager_id').val();
		var contact_manager_btn = $('#contact_manager_btn').val();
		$.ajax({
			url: 'includes/contact-manager.php',
			method: 'POST',
			data:{
				manager_id: manager_id,
				full_name: full_name,
				email_address: email_address,
				phone: phone,
				user_message: user_message,
				contact_manager_btn: contact_manager_btn
			},
			success:function(data){
				if (data == "Message has been sent, a feedback will be sent shortly") {
					swal('Thanks!', data, 'success');
				}else{
					swal('Error!', data, 'error');
				}
			},
			error:function(){
				swal('Error!','Ajax request error','error');
			}
		})
	})
	
	

})