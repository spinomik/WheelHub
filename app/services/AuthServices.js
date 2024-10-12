wheelHubApp.service('AuthService', [
	'$http',
	'$window',
	function ($http, $window) {
		this.user = null
		this.message = ''
		this.apiUrl = 'http://wheelhub.api.localhost:8000/api/'

		this.isLoggedIn = function () {
			return !!$window.localStorage.getItem('token')
		}

		this.login = function (username, password) {
			return $http
				.post(this.apiUrl + 'login', {
					username: username,
					password: password,
				})
				.then(function (response) {
					if (response.status === 200) {
						$window.localStorage.setItem('token', response.data.token)
						this.message = response.data.message
						console.log(this.message)

						return true
					} else {
						this.message = response.data.message
						console.log(this.message)

						return false
					}
				})
		}

		this.logout = function () {
			$window.localStorage.removeItem('token')
			this.user = null
		}

		this.register = function (username, password) {
			return $http.post('/api/register', { username: username, password: password })
		}
	},
])
