(function($) {

	var roleSelect = $('#role-select');
	var depsSelect = $('#department-select');
	var generatePassword = $('#generate-password');

	roleSelect.on( 'change', function(e){
		var t = $(this);
		var role = t.val();
		if ( role == 1 ) {
			depsSelect.parent().removeClass( 'hidden' );
		} else {
			depsSelect.parent().addClass( 'hidden' );
		}
	});


	generatePassword.on( 'click', function(e) {
		e.preventDefault();
		var randomstring = Math.random().toString(36).slice(-10);
		$('#password').val( randomstring );
	})

})(jQuery);
