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

	$(document).on( 'click', '#action-thumb-up',function(e){
		e.preventDefault();
		var t = $(this);
		var action = t.id;
		var postid = t.data( 'postid' );
	} )

	// $(document).on( 'click', '#modal-signin-button', function(e){
	// 	e.preventDefault();
	// 	var tendangnhap = $('#dk_tendangnhap').val();
	// 	var email = $('#dk_email').val();
	// 	var matkhau = $('#dk_matkhau').val();
	// 	$.ajax({
	// 		url: 'modules/quanlydangki.php',
	// 		type: 'POST',
	// 		data: {
	// 		    'tendangnhap': tendangnhap,
	// 		    'matkhau': matkhau,
	// 		    'email': email,
	// 		},
	// 		success: function( response ) {
	// 			var data = jQuery.parseJSON( response );
	// 			if ( data.login_status == 'success' ) {
	// 				window.location.href = data.redirect;
	// 			} else {
	// 				$('#dk-warning-info').text( 'Tên đăng nhập hoặc email trùng.' );
	// 			}


	// 		},
	// 		complete: function(xhr, textStatus) {

	// 		}
	// 	});	
	// })



// // init Isotope
// var $grid = $('.grid').isotope({
//   itemSelector: '.item',
//   layoutMode: 'fitRows',
// });

// // bind filter button click
// $(document).on( 'click', '#filters a', function(e) {
// 	e.preventDefault();
// 	var filterValue = $( this ).attr('data-filter');
// 	$grid.isotope({ filter: filterValue });
// });

// // change is-checked class on buttons
// $('.button-group').each( function( i, buttonGroup ) {
//   var $buttonGroup = $( buttonGroup );
//   $buttonGroup.on( 'click', '#filters a', function() {
//     $buttonGroup.find('.is-checked').removeClass('is-checked');
//     $( this ).addClass('is-checked');
//   });
// });
  
// $('.gallery').masonry({
//   itemSelector: '.mansonry',
//   columnWidth: 160
// });

})(jQuery);