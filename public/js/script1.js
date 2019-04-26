$(document).on('keyup', '.ps1', function(){
		var ps1 = $('.ps1').val();

		if (ps1.length <= 3){
			$('#result').text('Password too short');
			$('#myBar').css({"width":"25%", "background-color" : "red"});
		}else {
			$('#result').empty();
		}
		if ( ps1.length >=4){
			$('#myBar').css({'width' : '50%', 'background-color' : 'orange' });
			$('#result').text('Password too weak');
		}
		if (ps1.length >=6){
			$('#myBar').css({'width' : '75%', 'background-color' : 'yellow' });
			$('#result').text('Password is average');
		}
		if (ps1.length >=7){
			$('#myBar').css({'width' : '100%', 'background-color' : 'green' });
			$('#result').text('Password is strong');
		}
		if (ps1 == ""){
			$('#myBar').css({"width":"10%", "background-color" : "transparent"});
			$('#result').empty();
		}
	});
	// validation function
	function validateForm() {
		var em = $('form').find('input[type=email]').val();
		var ps1 = $('.ps1').val();
		var ps2 = $('.ps2').val();
		// If email input is blank
		if (em == ""){
			$('#result').text('email not entered');
			return false;
		}
		else if (ps1 != ps2) {
			$('#result').text('Passwords do not match');
			return false;
		}
		else if (ps1 == "") {
			$('#result').text('Password not entered');
			return false;
		}
		else if (ps2.length <= 5){
			$('#result').text('Password must be more than 5 characters')
			return false;
		}
		else {
			alert('Form Submitted');
			$('.emailbox, .ps1, .ps2').val("");
			$('#result').empty();
			$('#myBar').css("background-color", "transparent");
		}
	};
		$('form').on('submit',function(e){
			validateForm();
			e.preventDefault()
		});
