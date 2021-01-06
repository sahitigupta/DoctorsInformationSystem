	
	$(document).on('click','#btn-add',function(e) {
		var data = $("#user_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
				/* alert(dataResult); */
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
		var doc_id=$(this).attr("data-doc_id");
		var hosp_id=$(this).attr("data-hosp_id");
		var day=$(this).attr("data-day");
		var from_time=$(this).attr("data-from_time");
		var to_time=$(this).attr("data-to_time");
		$('#id_u').val(id);			
		$('#doc_id_u').val(doc_id);
		$('#hosp_id_u').val(hosp_id);
		$('#day_u').val(day);
		$('#from_time_u').val(from_time);
		$('#to_time_u').val(to_time);
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
				type: "V3",
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteEmployeeModal').modal('hide');
					$("#"+dataResult).remove();
			
			}
		});
	});
	
	
