wheelHubApp.service('AuthService', [
	'API_URL',
	'$http',
	'$window',
	function (API_URL, $http, $window) {
		this.user = null
		this.message = ''

		this.isLoggedIn = function () {
			return !!$window.localStorage.getItem('token')
		}

		this.login = function (username, password) {
			return $http
				.post(API_URL + 'login', {
					username: username,
					password: password,
				})
				.then(response => {
					if (response.data.code === 200) {
						$window.localStorage.setItem('token', response.data.data.token)
						$window.localStorage.setItem(
							'user',
							JSON.stringify(response.data.data)
						)
						this.message = response.data.message
						return { success: response.data.access, message: this.message }
					} else {
						this.message = response.data.message
						return { success: response.data.access, message: this.message }
					}
				})
		}

		this.getUser = function () {
			const user = $window.localStorage.getItem('user')
			return user ? JSON.parse(user) : null
		}

		this.logout = function () {
			$window.localStorage.removeItem('token')
			$window.localStorage.removeItem('user')
			this.user = null
		}
	},
])
