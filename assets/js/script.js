(function($) {
	
	var submitButton = $('#idea-submit');

	submitButton.on( 'click', function(e){
		e.preventDefault();

		$('#title-alert').remove();
		$('#desc-alert').remove();

		var termConditionCheck = $('#term-condition-check');
		if ( !termConditionCheck.is(':checked') ) {
			alert( 'You have to agree to our terms and conditions.' );
			return;
		}
		var fd = new FormData();

		var title = $('#idea-title').val();
		var desc = $('#idea-desc').val();
		var dep = $('#idea-dep').val();
		var topic = $('#topic').val();
		var cat = $('#idea-cat').val();

		var userID = $('#user-id').val();

		var anonymousSubmit = false;
		var anonymousSubmitCheck = $('#anonymous-submit');
		if ( anonymousSubmitCheck.is(':checked') ) {
			anonymousSubmit = true;
		}

		fd.append( "title", title );
		fd.append( "desc", desc );
		fd.append( "dep", dep );
		fd.append( "topic", topic );
		fd.append( "cat", cat );
		fd.append( "anonymousSubmit", anonymousSubmit );
		fd.append( "userID", userID );


	    var file_data = $('#idea-attachment')[0].files; // for multiple files
	    for(var i = 0;i<file_data.length;i++){
	        fd.append("file_"+i, file_data[i]);
	    }

	    $.ajax({
	            url: 'modules/add_idea.php',
	            type: 'POST',
	            data: fd,
	            enctype: 'multipart/form-data',
			    cache: false,
			    contentType: false,
			    processData: false,
		        success: function( resp ) {
		        	var res = $.parseJSON( resp );
		        	if ( res.error ) {
		        		$.each( res.error, function( i,e ){
		        			if ( 'title' == i ) {
		        				var titleAlert = $('#title-alert');
		        				if ( titleAlert.length == 0 ) {
		        					$('.title-input').append('<div id="title-alert" class="col-sm-12 alert alert-danger">'+e+'</div>');
		        				}

		        			} else if ( 'desc' == i ) {
		        				$('.desc-input').append('<div id="desc-alert" class="col-sm-12 alert alert-danger">'+e+'</div>');
		        			} else if ( 'topic' == i ) {
		        				$('.topic-input').append('<div id="desc-alert" class="col-sm-12 alert alert-danger">'+e+'</div>');
		        			}
		        		})
		        	} else if ( res.success ) {
		        		window.location.href = res.redirect;
		        	}
		        	// if ( resp ) {
		        	// 	if ( resp.data.fail_upload > 0 ) {
		        	// 		alert( resp.data.fail_upload+ ' attachment failed to upload duel to max upload size.' );
		        	// 	}

		         //    }
		        },
		          complete: function(xhr, textStatus) {
		      //     	if ( textStatus == 'error' ) {
			    	// 	alert("Unable to upload, please try again.");
			    	// }
		        }	
		    });	

	} )


	var ajaxRequestSwitch = false;
	$(document).on( 'click', '.idea-request-switch', function(e){
		e.preventDefault;
		if ( !ajaxRequestSwitch ) {
			ajaxRequestSwitch = true;
			var t = $(this);
			var requestId = t.data('id');
			var action = t.data('action');
			var data = {
				action: action,
				requestId: requestId,
			}

			$.ajax({
				url: 'modules/ajax.php',
				data: data,
				type: 'POST',
				dataType: 'json',
				success: function(response){
					// if ( response.error ) {
					// 	alert('You don\'t allow to download the attachments.')
					// }
				},
		        complete: function(xhr, textStatus) {
		          	ajaxRequestSwitch = false;
		        }
			});

		}
	})

	var topicChangeContainer = $('#topic-change-container');
	$(document).on( 'change', '#idea-dep', function(e){
		e.preventDefault();
		var t = $(this);
		var depID = t.val();
		var action = t.data('action');
		var data = {
			action: action,
			depID: depID,
		}
	$.ajax({
			url: 'modules/ajax.php',
			data: data,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if ( response.error ) {
					topicChangeContainer.html('<h5>No topic available.</h5>');
				} else {
					var html = '';
					html += '<select name="topic" id="topic" class="form-control topic-input">';
					$.each( response, function(i,e){
						html += '<option value="'+e.id+'">'+e.title+'</option>';
					})
					html += '</select>';
					topicChangeContainer.html( html );
				}
			},
	        complete: function(xhr, textStatus) {
	        }
		});
	} )

	var thumbAction = false;
	$(document).on( 'click', '.action-thumb',function(e){
		e.preventDefault();
		if ( thumbAction == false ) {
			thumbAction = true;
			var t = $(this);
			var postid = t.data( 'postid' );
			var action = t.data('action');
			var data = {
				action:  action,
				postid: postid,
			}

			$.ajax({
				url: 'modules/ajax.php',
				data: data,
				type: 'POST',
				dataType: 'json',
				success: function(response){

				},
		        complete: function(xhr, textStatus) {
		        	thumbAction = false;
		        	location.reload();
		        }
			});
		}
	} )

// auto scroll to comment
var comment = window.location.hash.substr(1);
if( typeof comment != "undefined" && comment != '' ) {
	var scroll = comment.replace( "comment=", "");
	$('html, body').animate({
	        scrollTop: $('.media[data-comment='+scroll+']').offset().top
	    }, 1500);
}
})(jQuery);