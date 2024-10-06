wheelHubApp.service('AuthService', [
	'$http',
	'$window',
	function ($http, $window) {
		this.user = null

		// check user is Login
		this.isLoggedIn = function () {
			return !!$window.localStorage.getItem('token')
		}

		// Login user
		this.login = function (username, password) {
			console.log(this.user)
			return $http.post('/api/login', { username: username, password: password }).then(function (response) {
				// save token in sesion
				$window.localStorage.setItem('token', response.data.token)
				this.user = response.data.user
			})
		}

		// Logout user
		this.logout = function () {
			$window.localStorage.removeItem('token')
			this.user = null
		}

		// register user
		this.register = function (username, password) {
			return $http.post('/api/register', { username: username, password: password })
		}
	},
])
