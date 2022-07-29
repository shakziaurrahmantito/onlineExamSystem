$(function(){

	//For User Registration

	$("#regSubmit").click(function(){

		var name 		= $("#name").val();
		var username 	= $("#username").val();
		var password 	= $("#password").val();
		var email 		= $("#email").val();

		var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;

		$.ajax({
			type 	: "POST",
			url 	: "getRegistration.php",
			data 	: dataString,
			success : function(data){
				if (Number(data) == "1") {
					$("#state").html("<span class='success'>Registration successfully.</span>");
					$("#name").val("");
					$("#username").val("");
					$("#password").val("");
					$("#email").val("");
				}else{
					$("#state").html(data);
				}
				
			}
		});

		return false;

	});


	//For User Login

	$("#login").click(function(){

		var email 		= $("#email").val();
		var password 	= $("#password").val();

		var dataString = 'email='+email+'&password='+password;

		$.ajax({
			type 	: "POST",
			url 	: "getlogin.php",
			data 	: dataString,
			success : function(data){
				
				if ($.trim(String(data)) == "empty") {
					$(".empty").show();
					setTimeout(function(){
						$(".empty").fadeOut();
					},4000);
				}
				else if ($.trim(String(data)) == "disabled") {
					$(".disabled").show();
					setTimeout(function(){
						$(".disabled").fadeOut();
					},4000);
				}
				else if ($.trim(String(data)) == "error") {
					$(".error").show();
					setTimeout(function(){
						$(".error").fadeOut();
					},4000);
				}else{
					window.location = "exam.php";
				}
				
			}
		});

		return false;

	});


});