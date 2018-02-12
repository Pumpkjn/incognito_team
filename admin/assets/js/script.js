(function($) {

	var roleSelect = $('#role-select');
	var depsSelect = $('#department-select');
	var generatePassword = $('#generate-password');

	generatePassword.on( 'click', function(e) {
		e.preventDefault();
		var randomstring = Math.random().toString(36).slice(-10);
		$('#password').val( randomstring );
	})

})(jQuery);
