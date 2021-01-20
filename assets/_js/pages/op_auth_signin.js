/*
 *  Document   : op_auth_signin.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign In Page
 */

class pageAuthSignIn {
	/*
	 * Init Sign In Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
	 *
	 */
	static initValidation() {
		// Load default options for jQuery Validation plugin
		One.helpers('validation');

		// Init Form Validation
		jQuery('.js-validation-signin').validate({
			rules: {
				'login-username': {
					required: true,
					minlength: 3
				},
				'login-password': {
					required: true,
					minlength: 5
				}
			},
			messages: {
				'login-username': {
					required: 'Silahkan masukan username anda',
					minlength: 'Minimal username adalah 3 karakter'
				},
				'login-password': {
					required: 'Silahkan isi password anda',
					minlength: 'Minimal password adalah 5 karakter'
				}
			}
		});
	}

	/*
	 * Init functionality
	 *
	 */
	static init() {
		this.initValidation();
	}
}

// Initialize when page loads
jQuery(() => { pageAuthSignIn.init(); });
