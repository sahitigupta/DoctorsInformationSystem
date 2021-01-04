	
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
		var hosp_name=$(this).attr("data-hosp_name");
		var phone_number=$(this).attr("data-phone_number");
		var website=$(this).attr("data-website");
		var ratings=$(this).attr("data-ratings");
		var loc_id=$(this).attr("data-loc_id");
		var total_doctors=$(this).attr("data-total_doctors");
		$('#id_u').val(id);			
		$('#hosp_name_u').val(hosp_name);
		$('#phone_number_u').val(phone_number);
		$('#website_u').val(website);
		$('#ratings_u').val(ratings);
		$('#loc_id_u').val(loc_id);
		$('#total_doctors_u').val(total_doctors);
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
				type: "H3",
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteEmployeeModal').modal('hide');
					$("#"+dataResult).remove();
			
			}
		});
	});
	
	
