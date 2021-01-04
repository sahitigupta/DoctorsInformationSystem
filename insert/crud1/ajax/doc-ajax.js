	
	$(document).on('click','#btn-add',function(e) {
		var data = $("#user_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
				alert(dataResult);
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addEmployeeModal').modal('hide');
						alert('Data added successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	
	$(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var first_name=$(this).attr("data-first_name");
		var last_name=$(this).attr("data-last_name");
		var spec_id=$(this).attr("data-spec_id");
		var specilization_from=$(this).attr("data-specilization_from");
		var exp_start_date=$(this).attr("data-exp_start_date");
		var qualification=$(this).attr("data-qualification");
		var phone=$(this).attr("data-phone_no");
		var email=$(this).attr("data-email");
		var loc_id=$(this).attr("data-loc_id");
		$('#id_u').val(id);			
		$('#first_name_u').val(first_name);
		$('#last_name_u').val(last_name);
		$('#spec_id_u').val(spec_id);
		$('#specilization_from_u').val(specilization_from);
		$('#exp_start_date_u').val(exp_start_date);
		$('#qualification_u').val(qualification);
		$('#phone_no_u').val(phone);
		$('#email_u').val(email);
		$('#loc_id_u').val(loc_id);
	}); 
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
					alert(dataResult);
					var dataResult = JSON.parse(dataResult);
					
					if(dataResult.statusCode==200){
						$('#editEmployeeModal').modal('hide');
						alert('Data updated successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	
	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
		
	});
	$(document).on("click", "#delete", function() { 
		$.ajax({
			url: "backend/save.php",
			type: "POST",
			cache: false,
			data:{
				type: "D3",
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteEmployeeModal').modal('hide');
					$("#"+dataResult).remove();
			
			}
		});
	});
	
	
