$(document).ready(function(){
	var edit_profile_error = $('#edit-profile-error');
	$('#update-password-error').css('display','none');
	edit_profile_error.css('display','none');
	$('#edit-profile-form').submit(function (e){
		e.preventDefault();
		var edit_full_name = $('#edit_full_name').val();
		var edit_email = $('#edit_email').val();
		var edit_address = $('#edit_address').val();
		var edit_phone = $('#edit_phone').val();
		var edit_description = $('#edit_description').val();
		var update_profile_btn = $('#update_profile_btn').val();
		var edit_profile_id = $('#edit_profile_id').val();
		$.ajax({
			url: 'includes/validation.php',
			method: 'POST',
			data:{
				edit_profile_id: edit_profile_id,
				edit_full_name: edit_full_name,
				edit_email: edit_email,
				edit_address: edit_address,
				edit_phone: edit_phone,
				edit_description: edit_description,
				update_profile_btn: update_profile_btn
			},
			success:function(data, status){
				edit_profile_error.slideDown();
				edit_profile_error.html(data);
			},
			error:function(status){
				alert(status);
			}
		})
	})
	$('#edit-pic-upload').on('change', function(){
		var old_pic = $('#old_pic').val();
		// var form = $(this);
		$('#fuck').load('includes/delete-old-pic.php',
		{
			old_pic:old_pic
		});
		$('.edit-profile-pic-form').submit();
	});
	$('.edit-profile-pic-form').submit(function (e){
		e.preventDefault();
		$.ajax({
			url: 'includes/update-profile-picture.php',
			method: 'POST',
			data: new FormData(this),
			contentType:false,
			processData:false,
			success:function(data, status){
				if (status == 'success') {
					// swal("Success!", data + '\n Page will reload', "success");
					alert(data);
					// setInterval(reload, 4000);
					// function reload(){
					// 	window.location.reload();
					// }
				}else{
					swal("Error!", "Your picture could not be uploaded", "Error");
				}
			}
		});
	});

	$('.update-password-form').submit(function (e){
		e.preventDefault();
		var current_password = $('#current_password').val();
		var new_password = $('#new_password').val();
		var confirm_password = $('#confirm_password').val();
		var update_password_btn = $('#update-password-btn').val();
		$.ajax({
			url: 'includes/password-reset.php',
			method: 'POST',
			data: {
				current_password: current_password,
				new_password: new_password,
				confirm_password: confirm_password,
				update_password_btn: update_password_btn
			},
			success:function(data, status){
				$('#update-password-error').slideDown();
				$('#update-password-error').html(data);
				if (data == 'Password successfully updated') {
					$('#update-password-error').css('display','none');
					swal('Success!', data, 'success');
				}
			}
		});
	});
	$('#display_image_section').click(function(e){
		var hostel_name = $('#hostel_name').val();
		var hostel_status = $('#hostel_status').val();
		var hostel_address = $('#hostel_address').val();
		var hostel_room_type = $('#hostel_room_type').val();
		var hostel_min_price = $('#hostel_min_price').val();
		var hostel_max_price = $('#hostel_max_price').val();
		var hostel_detail = $('#hostel_detail').val();
		var air_conditioning = $('#air_conditioning:checked').val();;
		var alarm_system = $('#alarm_system:checked').val();
		var cctv_camera = $('#cctv_camera:checked').val();
		var one_room = $('#one_room:checked').val();
		var two_rooms = $('#two_rooms:checked').val();
		var three_rooms = $('#three_rooms:checked').val();
		var car_packing = $('#car_packing:checked').val();
		var swimming_pool = $('#swimming_pool:checked').val();
		var laundry_room = $('#laundry_room:checked').val();
		var seat_places = $('#seat_places:checked').val();
		var kitchen = $('#kitchen:checked').val();
		var display_image_section = $('#display_image_section').val();
		$.ajax({
			url:'includes/submit-hostel.php',
			method:'POST',
			data: {
				hostel_name: hostel_name,
				hostel_status: hostel_status,
				hostel_address: hostel_address,
				hostel_room_type: hostel_room_type,
				hostel_min_price: hostel_min_price,
				hostel_max_price: hostel_max_price,
				hostel_detail: hostel_detail,
				air_conditioning: air_conditioning,
				alarm_system: alarm_system,
				cctv_camera: cctv_camera,
				one_room: one_room,
				two_rooms: two_rooms,
				three_rooms: three_rooms,
				car_packing: car_packing,
				swimming_pool: swimming_pool,
				laundry_room: laundry_room,
				seat_places: seat_places,
				kitchen: kitchen,
				display_image_section: display_image_section
			},
			success:function(data,status){
				if (data == 'Hostel submitted, Please proceed to adding Images') {
					swal({
						title: "Success!",
						text: data,
						type: "success",
						showCancelButton: false,
						confirmButtonClass: "btn-success",
						confirmButtonText: "Proceed to Uploads!",
						closeOnConfirm: true,
						closeOnCancel: false
					},
					function(isConfirm) {
						if (isConfirm) {
							$('.form-fields, #display_image_section').css('display','none');
							$('.hostel-img-section').slideDown();
						} else {
							swal("Cancelled", "Your imaginary file is safe :)", "error");
						}
					});
				}else{
					swal("Error!", data, 'error');
				}
			},
			error:function(){
				alert('there is an error');
			}
		})
	})
	function go_back(){
		window.location = 'dashboard.php';
	}
	$('.dropzone-design').on('dragover', function (){
		$(this).addClass('file_drag_over');
		return false;
	});

	$('.dropzone-design').on('dragleave', function (){
		$(this).removeClass('file_drag_over');
		return false;
	});
	$('.dropzone-design').on('drop', function (e){
		e.preventDefault();
		$(this).removeClass('file_drag_over');
		var formData = new FormData();
		var files_list = e.originalEvent.dataTransfer.files;
		for (var i=0; i<files_list.length; i++) {
			formData.append('file[]',files_list[i]);
		}
			$.ajax({
				url: 'includes/submit-hostel.php',
				method: 'POST',
				data: formData,
				contentType: false,
				cache: false,
				processData: false,
				success:function(data){
					swal("Thank You", data, "success");
				}
			});
		});
});