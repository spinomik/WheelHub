//TODO: dodać obsługę błędów
wheelHubApp.controller('LoginController', [
	'$scope',
	'AuthService',
	'$location',
	function ($scope, AuthService, $location) {
		$scope.login = function () {
			AuthService.login($scope.username, $scope.password).then(
				function () {
					$location.path('/home')
				},
				function (error) {
					$scope.errorMessage = 'Niepoprawne dane logowania'
				}
			)
		}
	},
])
