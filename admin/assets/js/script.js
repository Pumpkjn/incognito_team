(function($) {

	var roleSelect = $('#role-select');
	var depsSelect = $('#department-select');
	var generatePassword = $('#generate-password');

	generatePassword.on( 'click', function(e) {
		e.preventDefault();
		var randomstring = Math.random().toString(36).slice(-10);
		$('#password').val( randomstring );
	})

	// ajaxDownload = false;
	// $(document).on( 'click', '.download-attachment', function(e){
	// 	e.preventDefault();
	// 	if ( !ajaxDownload ) {
	// 		ajaxDownload = true;
	// 		var t = $(this);
	// 		var package = t.data('package');
	// 		var idea = t.data('idea');
	// 		var data = {
	// 			package: package,
	// 			idea: idea
	// 		}
	// 		$.ajax({
	// 			url: 'modules/download_package.php',
	// 			data: data,
	// 			type: 'POST',
	// 			dataType: 'json',
	// 			success: function(response){
	// 				if ( response.error ) {
	// 					alert('You don\'t allow to download the attachments.')
	// 				}
	// 			},
	// 	        complete: function(xhr, textStatus) {
	// 	          	ajaxDownload = false;
	// 	        }
	// 		});
	// 		}
	// } )


})(jQuery);
