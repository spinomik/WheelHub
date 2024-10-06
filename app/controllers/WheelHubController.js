wheelHubApp.controller('WheelHubController', [
	'$scope',
	function ($scope) {
		$scope.showSidenav = false
		$scope.activePage = 'HomePage'

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
