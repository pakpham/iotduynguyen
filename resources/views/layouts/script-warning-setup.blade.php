<script type="text/javascript">
	var data_temp;
	var warning_ss1_1;
	var warning_sign_ss1_1;
	var warning_list_mail_html='';
	var updateWarningMailList;

	$(document).ready(function(){
		// SETUP SENSOR STATION 1
		$("#btn-warning-sss1").click(function(){
			$("#btn-warning-sss1").addClass('disabled');
			$("#btn-warning-sss1").text('Seting...');
	     	$.ajax({
               type:'get',
               url:'setWarningSSS1',
               data:{
               	_token: "{{ csrf_token() }}",
               	warning_value: readSSS1(),
               },
               success:function(msg) {
                  	alert('Done. Set complete!');
                  	data_temp = msg;
                  	$("#btn-warning-sss1").removeClass('disabled');
					$("#btn-warning-sss1").text('Save');
               }
            });
		});



		// RESET BUTTON
		$("#btn-warning-reset").click(function(){
			$("#btn-warning-reset").addClass('disabled');
			$("#btn-warning-reset").text('Seting...');
			$.ajax({
               type:'POST',
               url:'resetWarning',
               data:{
               	_token: "{{ csrf_token() }}",
               	warning_value: readSSS1(),
               },
               success:function(msg) {
                  	alert('Done. Reset complete!');
                  	$("#btn-warning-reset").removeClass('disabled');
					$("#btn-warning-reset").text('Reset');
					location.reload();
               }
            });
		});


		//ADD WARNING MAIL
		$("#btn-add-warning-mail").click(function(){
			$("#btn-add-warning-mail").addClass('disabled');
			$("#btn-add-warning-mail").text('Seting...');
			var input_warning_mail = document.getElementById('input-warning-mail').value;

			$.ajax({
               type:'GET',
               url:'add-warning-mail',
               data:{
               	_token: "{{ csrf_token() }}",
               	warning_mail: input_warning_mail,
               },
               success:function(msg) {
                  	alert(msg);
                  	getWarningListMail();
                  	$("#btn-add-warning-mail").removeClass('disabled');
					$("#btn-add-warning-mail").text('Add');
               }
            });
		});

		// GET WARNING LIST MAIL AJAX
		function getWarningListMail(){
			$.ajax({
               type:'GET',
               url:'get-warning-list-mail',
               data:{
               	_token: "{{ csrf_token() }}",
               },
               success:function(msg) {
                  	data_temp = msg;
                  	var list_mail = msg;
                  	var list_mail_length = list_mail.length;
                  	for (var i = 0; i < list_mail.length; i++) {
                  		warning_list_mail_html = warning_list_mail_html + "<li class='list-group-item'>"+list_mail[i].mail+"<button  onclick='delMail()' class='btn btn-danger float-right warning-mail-del' value='"+list_mail[i].id+"'>DELETE</button></li>";
                  	}
                  	document.getElementById('warning-list-mails').innerHTML = warning_list_mail_html;
                  	warning_list_mail_html='';
                  	document.getElementById('input-warning-mail').value = '';
               }
            });
		}
		updateWarningMailList = getWarningListMail;

		// DELETE WARNING MAIL
		function delMail(){
			alert('btn');
		}


		getWarningListMail();
	});

	//Delte warning mail
	function delMail(){
		var id_warning_mail = document.querySelector('.warning-mail-del').value;
		$.ajax({
               type:'GET',
               url:'del-warning-mail',
               data:{
               	_token: "{{ csrf_token() }}",
               	id:id_warning_mail,
               },
               success:function(msg) {
                  	data_temp = msg;
        			alert(data_temp);
        			updateWarningMailList();
               }
            });
	}

	function readSSS1 (){
		warning_ss1_1 		= document.getElementById('warning-ss1-1').value;
		warning_sign_ss1_1 	= document.getElementById('warning-sign-ss1-1').value;
		warning_ss1_2 		= document.getElementById('warning-ss1-2').value;
		warning_sign_ss1_2 	= document.getElementById('warning-sign-ss1-2').value;
		warning_ss1_3 		= document.getElementById('warning-ss1-3').value;
		warning_sign_ss1_3 	= document.getElementById('warning-sign-ss1-3').value;
		warning_ss1_4 		= document.getElementById('warning-ss1-4').value;
		warning_sign_ss1_4 	= document.getElementById('warning-sign-ss1-4').value;
		return {
			warning_ss1_1 : warning_ss1_1,
			warning_sign_ss1_1 : warning_sign_ss1_1,
			warning_ss1_2 : warning_ss1_2,
			warning_sign_ss1_2 : warning_sign_ss1_2,
			warning_ss1_3 : warning_ss1_3,
			warning_sign_ss1_3 : warning_sign_ss1_3,
			warning_ss1_4 : warning_ss1_4,
			warning_sign_ss1_4 : warning_sign_ss1_4,
			id_station: 1,
		}
	}

</script>