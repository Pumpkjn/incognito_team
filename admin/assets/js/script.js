(function($) {
	
	// Đăng nhập 

	// $(document).on( 'click', '#login-button' ,function(e){
	// 	e.preventDefault();
	// 	$('#login-modal').modal('show');		
	// });


	$(document).on( 'click', '#modal-login-button', function(e){
		e.preventDefault();
		var user_name = $('#user_name').val();
		var password = $('#password').val();
		$.ajax({
			url: 'modules/login.php',
			type: 'POST',
			data: {
			    'user_name': user_name,
			    'password': password,
			},
			success: function( response ) {
				var data = jQuery.parseJSON( response );
				if ( data.login_status == 'success' ) {
					window.location.href = data.redirect;
				} else {
					$('#warning-info').text( 'Thông tin sai' );
				}


			},
			complete: function(xhr, textStatus) {

			}
		});	
	})

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
