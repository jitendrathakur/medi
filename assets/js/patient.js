$(function() {

	$('#myModal').modal();

	commentReplyUrl = '';

	$("#reply").click(function() {

		commentReplyUrl = $(this).attr('href');
	});

	$("#submit_reply").click(function() {

		var dataPost = $("#journal_comment").val();

		if (dataPost == '') {
			alert("please enter any comment");
			return false;
		}

		$.ajax({
	        type: "POST",
	        url: commentReplyUrl,   
	        cache: true,
	        dataType: "json",
	        data: dataPost,
	        success: function(response) {	          
	            $('#myModal').modal('hide');
	        }
	    });
	});

});