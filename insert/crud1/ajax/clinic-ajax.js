	
	$(document).on('click','#btn-add',function(e) {
		var data = $("#user_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
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
		var clinic_name=$(this).attr("data-clinic_name");
		var doc_id=$(this).attr("data-doc_id");
		var from_time=$(this).attr("data-from_time");
		var to_time=$(this).attr("data-to_time");
		var day=$(this).attr("data-day");
		var phone_no=$(this).attr("data-phone_no");
		var ratings=$(this).attr("data-ratings");
		var loc_id=$(this).attr("data-loc_id");
		$('#id_u').val(id);			
		$('#clinic_name_u').val(clinic_name);
		$('#doc_id_u').val(doc_id);
		$('#from_time_u').val(from_time);
		$('#to_time_u').val(to_time);
		$('#day_u').val(day);
		$('#phone_no_u').val(phone_no);
		$('#ratings_u').val(ratings);
		$('#loc_id_u').val(loc_id);
	}); 
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
					/*alert(dataResult); */
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
				type: "C3",
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteEmployeeModal').modal('hide');
					$("#"+dataResult).remove();
			
			}
		});
	});
	
	
