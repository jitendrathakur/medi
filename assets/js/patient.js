$(function() {	

	commentReplyUrl = '';

	$(".reply").click(function() {

		commentReplyUrl = $(this).attr('url');

		$("#journal_comment").val('');
		
	});

	$(document).on('click', '#submit_reply', function() {

		var dataPost = $("form#comment").serialize();

		var comment = $("#journal_comment").val();
		
		if (comment == '') {
			alert("please enter any comment");
			return false;
		} else {
			$.ajax({
		        type: "POST",
		        url: commentReplyUrl,   
		        cache: false,
		        dataType: "json",
		        data: dataPost,
		        success: function(response) {	          
		            $('#myModal').modal('hide');
		        }
		    });

		}		
	});

});