$(function() {
	$( "#datepicker, #renewal" ).datepicker();

	if ($("#alert_list").length > 0) {
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


	if ($("#alert_therapist").length > 0) {

		var model = $("#alert_therapist").attr("data-url");
		$.ajax({
	        type: "GET",
	        url: baseUrl + 'therapist/alert_read/'+model,
	        cache: false,
	        dataType: "json",
	        success: function(response) { 

	        	console.log(response);

	        }
	    });     
	}


});