wheelHubApp.controller('WheelHubController', [
	'API_URL',
	'$scope',
	'$route',
	function (API_URL, $scope, $route) {
		$scope.showSidenav = false
		$scope.activePage = 'home'
		$scope.$on('$routeChangeSuccess', function () {
			$scope.activePage = $route.current.originalPath.replace('/', '') || 'HomePage'
			$scope.showSidenav = false
		})
		// 0 - user 1 - admin

		$scope.user = {
			userRole: 1,
			username: 'spinomik',
			firstName: 'Mikołaj',
			lastName: 'Majewski',
		}

		// $scope.user = {
		// 	userRole: null,
		// 	username: null,
		// 	firstName: null,
		// 	lastName: null,
		// }

		// $scope.user = {
		// 	userRole: 0,
		// 	username: 'JanNowak',
		// 	firstName: 'Jan',
		// 	lastName: 'Nowak',
		// }
	},
])
