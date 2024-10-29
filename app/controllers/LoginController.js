//TODO: dodać obsługę błędów
wheelHubApp.controller('LoginController', [
	'$scope',
	'AuthService',
	'$location',
	function ($scope, AuthService, $location) {
		$scope.user = {}
		$scope.message = ''
		$scope.login = function () {
			AuthService.login($scope.user.username, $scope.user.password).then(
				result => {
					if (result.success) {
						$scope.message = result.message
						$scope.$emit('userLoggedIn')
						$location.path('/home')
					} else {
						$scope.message = result.message
						alert($scope.message)
					}
				}
			)
		}

		if ($location.path() === '/logout') {
			AuthService.logout()
			$scope.message = 'Zostałeś wylogowany.'
			$location.path('/home')
		}
	},
])
