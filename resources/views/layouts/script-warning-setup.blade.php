<script type="text/javascript">
	var data_temp;
	var warning_ss1_1;
	var warning_sign_ss1_1;


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
	});







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