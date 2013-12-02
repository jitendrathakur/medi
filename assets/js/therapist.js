$(function() {
	$( "#datepicker, #renewal" ).datepicker();

	if ($("#alert_list").length >= 0) {
		$.ajax({
	        type: "GET",
	        url: baseUrl + 'forms/alert_read/',
	        cache: false,
	        dataType: "json",
	        success: function(response) { 

	        	console.log(response);

	        }
	    });     
	}


});