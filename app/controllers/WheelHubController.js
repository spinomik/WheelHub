wheelHubApp.controller('WheelHubController', [
	'$scope',
	'$route',
	'AuthService',
	function ($scope, $route, AuthService) {
		$scope.showSidenav = false
		$scope.activePage = 'home'

		$scope.$on('$routeChangeSuccess', function () {
			$scope.activePage =
				$route.current.originalPath.replace('/', '') || 'HomePage'
			$scope.showSidenav = false
		})

		$scope.user = AuthService.getUser() || {
			userRole: null,
			username: null,
			firstName: null,
			lastName: null,
		}

		$scope.$on('userLoggedIn', function () {
			$scope.user = AuthService.getUser()
		})
	},
])
