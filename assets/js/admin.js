var valid = true;
function eMsg(message){
	alert('Error: L'+message+'+');
}//end eMsg

//laundry type
$('#newType').click(function(event) {
	/* Act on the event */
	$('#type-type').val('insert');
	$('#type').val('');
	$('#price').val('');
	$('#modal-lau-type').find('.modal-title').text('New Laundry Type');
	$('#modal-lau-type').modal('show');
});

//inset new type
$(document).on('submit', '#form-type', function(event) {
	event.preventDefault();
	/* Act on the event */
    var type_id = $('#type-id').val();
    var type = $('#type').val();
    var price = $('#price').val();
    var type_type = $('#type-type').val();
 	if(type_type == 'insert'){
	   $.ajax({
			url: 'data/insert_type.php',
			type: 'post',
			dataType: 'json',
			data: {
				type:type,
				price:price
			},
			success: function (data) {
				// console.log(data);
				if(data.valid == valid){
					$('#modal-lau-type').modal('hide');
					all_type();
					$('#type').val('');
					$('#price').val('');
					$('#modal-msg').find('#msg-body').text(data.msg);
					$('#modal-msg').modal('show');
				}
			},
			error: function(){
				eMsg(26);
			}
		});
 	}else if(type_type == 'edit'){
 		$.ajax({
 				url: 'data/edit_type.php',
 				type: 'post',
 				dataType: 'json',
 				data: {
 					type_id:type_id,
 					type:type,
 					price:price
 				},
 				success: function (data) {
 					// console.log(data);
 					if(data.valid == valid){
 						all_type();
 						$('#modal-lau-type').modal('hide');
 						$('#modal-msg').find('#msg-body').text(data.msg);
 						$('#modal-msg').modal('show');
 					}
 				},
 				error: function(){
 					eMsg(58);
 				}
 			});
 	}else{
 		//where magic begins .wahaha
 	}
});

//display type table
function all_type(){
	$.ajax({
			url: 'data/all_types.php',
			type: 'post',
			success: function (data) {
				$('#table-type').html(data);
			},
			error:function(){
				eMsg(45);
			}
		});
}//end all_type
all_type();

//edit type
function editType(type_id){
	$.ajax({
			url: 'data/get_type.php',
			type: 'post',
			dataType: 'json',
			data: {
				type_id:type_id
			},
			success: function (data) {
				// console.log(data);
				$('#type-type').val('edit');
				$('#type-id').val(data.laun_type_id);
				$('#type').val(data.laun_type_desc);
				$('#price').val(data.laun_type_price);
				$('#modal-lau-type').find('.modal-title').text('Edit Laundry Type');
				$('#modal-lau-type').modal('show');
			},
			error: function(){
				eMsg(72);
			}
		});
}//end editType


//all laundry
function all_laundry(){
	$.ajax({
			url: 'data/all_laundry.php',
			type: 'post',
			data: {

			},
			success: function (data) {
				$('#table-laundry').html(data);
			},
			error: function(){
				eMsg(128);
			}
		});
}//end all_laundry
all_laundry();

//open modal
$('#newLaun').click(function(event) {
	/* Act on the event */
	$('#laun-type').val('insert');
	$('#modal-laun').find('.modal-title').text('New Laundry');
	$('#modal-laun').modal('show');
});

$(document).on('submit', '#form-new-laun', function(event) {
	event.preventDefault();
	/* Act on the event */
	var modal_type = $('#laun-type').val();//insert/update
	var laun_id = $('#laun-id').val();//pk
	var customer = $('#customer').val();
	var priority = $('#priority').val();
	var weight = $('#weight').val();
	var type = $('#newlaun-type').val();
	if(modal_type == 'insert'){
		$.ajax({
				url: 'data/insert_laundry.php',
				type: 'post',
				dataType: 'json',
				data: {
					customer:customer,
					priority:priority,
					weight:weight,
					type:type
				},
				success: function (data) {
					// console.log(data);
					all_laundry();
					$('#modal-laun').modal('hide');
				},
				error: function(){
					eMsg(163);
				}
			});
	}else if(modal_type == 'edit'){
		$.ajax({
				url: 'data/edit_laundry.php',
				type: 'post',
				dataType: 'json',
				data: {
					customer:customer,
					priority:priority,
					weight:weight,
					type:type,
					laun_id: laun_id
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == valid){
						all_laundry();
						$('#modal-laun').modal('hide');
						$('#modal-msg').find('#msg-body').text(data.msg);
						$('#modal-msg').modal('show');
					}
				},
				error: function(){
					eMsg(183);
				}
			});
	}else{
		//where the magic begins .mhuahwahwahwah
		//soo sleepy. programmer sucks
	}

});//end submit form

//delete laundry
$('#delLaun').click(function(event) {
	/* Act on the event */
  var haveCheck = false;
  $('input[type=checkbox]:checked').each(function(index) {
 	haveCheck = true;
  });

  if(haveCheck == false){
  	 alert('Please check the row(s) that you want to delete.');
  }else{
  	$('#confirm-type').val('delete-laundry');
  	$('#modal-confirm').modal('show');
  }
});

//if confirm button yes is click
$('#confirm-yes').click(function(event) {
	/* Act on the event */
	var confirmType = $('#confirm-type').val();
	if(confirmType == 'delete-laundry'){
		//delete laun
		$('input[type=checkbox]:checked').each(function(index) {
			var id = $(this).val();
			$.ajax({
					url: 'data/delete_laundry.php',
					type: 'post',
					data: {
						id:id
					},
					success: function (data) {
						// im soo sleepy
					},
					error: function(){
						eMsg(211);
					}
				});
	  	});//end check array
		$('#modal-confirm').modal('hide');	
		$('#modal-msg').find('#msg-body').text('Deleted Successfully!');	
		$('#modal-msg').modal('show');	
	}else if(confirmType == 'claim-laundry'){
		$('input[type=checkbox]:checked').each(function(index) {
			var id = $(this).val();
			$.ajax({
					url: 'data/claim_laundry.php',
					type: 'post',
					data: {
						id:id
					},
					success: function (data) {
						// soo  sleepy
					},
					error: function(){
						eMsg(258);
					}
				});
	  	});//end check array
	  	$('#modal-confirm').modal('hide');	
		$('#modal-msg').find('#msg-body').text('Claim and paid Successfully!');	
		$('#modal-msg').modal('show');
	}else{	
		//sooo fucking sleepy
	}
	all_laundry();
});//end if confirm yes is click

//edit laundry basin na sayop
function editLaundry(laun_id){
	$('#laun-type').val('edit');
	//fill
	$.ajax({
			url: 'data/get_laundry.php',
			type: 'post',
			dataType: 'json',
			data: {
				laun_id:laun_id
			},
			success: function (data) {
				// console.log(data);
				$('#laun-id').val(data.laun_id);
				$('#customer').val(data.customer_name);
				$('#priority').val(data.laun_priority);
				$('#weight').val(data.laun_weight);
				$('#newlaun-type').val(data.laun_type_id);
			},
			error: function(){
				eMsg(237);
			}
		});
	$('#modal-laun').find('.modal-title').text('Edit Laundry');
	$('#modal-laun').modal('show');
}//end editLaundry

//claim laundry
$('#claim').click(function(event) {
	/* Act on the event */
  var haveCheck = false;
  $('input[type=checkbox]:checked').each(function(index) {
 	haveCheck = true;
  });

  if(haveCheck == false){
  	 alert('Please check the row(s) that you want to claim.');
  }else{
  	$('#confirm-type').val('claim-laundry');
  	$('#modal-confirm').modal('show');
  }
});

//date choice sa report
$('#dailySale').change(function (e) {
	e.preventDefault();
	var date = $('#dailySale').val();
	if(date == '' || date == null){
		$('#printBut').hide();
	}else{
		$('#printBut').show();
	}

	$.ajax({
		url: 'data/daily_report.php',
		type: 'post',
		data: {
			date:date
		},
		success: function (data) {
			$('#table-sales').html(data);
		},
		error: function(){
			eMsg(330);
		}
	});	
});

function loadSale(){
	var date = $('#dailySale').val();
	$.ajax({
			url: 'data/daily_report.php',
			type: 'post',
			data: {
				date:date
			},
			success: function (data) {
				$('#table-sales').html(data);
			},
			error: function(){
				eMsg(348);
			}
		});
}//end loadSale
loadSale();

$('#print-button').click(function(event) {
	/* Act on the event */
	var date = $('#dailySale').val();
	window.open('data/print.php?date='+date,'name','width=600,height=400');
});

$('#changePass').click(function(event) {
	/* Act on the event */
	$('#modal-pass').find('.modal-title').text('Change Password');
	$('#modal-pass').modal('show');
});

$(document).on('submit', '#form-change', function(event) {
	event.preventDefault();
	/* Act on the event */
	var pwd = $('#pwd').val();
	var pwd2 = $('#pwd2').val();
	if(pwd != pwd2){
		alert("Password Not Match!");
	}else{
		//pass is match
		$.ajax({
				url: 'data/change_pass.php',
				type: 'post',
				dataType: 'json',
				data: {
					pwd:pwd
				},
				success: function (data) {
					if(data.valid == valid){
						$('#modal-pass').modal('hide');
						$('#modal-msg').find('#msg-body').text(data.msg);
						$('#modal-msg').modal('show');
					}
				},
				error: function(){
					eMsg(387);
				}
			});
	}
});