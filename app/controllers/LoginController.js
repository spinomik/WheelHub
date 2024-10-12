//TODO: dodać obsługę błędów
wheelHubApp.controller('LoginController', [
	'$scope',
	'AuthService',
	'$location',
	function ($scope, AuthService, $location) {
		$scope.user = {}
		$scope.login = function () {
			AuthService
			login($scope.user.username, $scope.user.password).then(function (success) {
				if (success) $location.path('/home')
				$location.path('/login')
			})
		}
	},
])
