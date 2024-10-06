//TODO: dodać pozostałe pola
//TODO: dodać obsługę błędów
wheelHubApp.controller('RegisterController', [
	'$scope',
	'AuthService',
	'$location',
	function ($scope, AuthService, $location) {
		$scope.user = {}

		$scope.register = function () {
			AuthService.register($scope.user).then(
				function () {
					$location.path('/login')
				},
				function (error) {
					$scope.errorMessage = 'Rejestracja nieudana. Spróbuj ponownie.'
				}
			)
		}
	},
])
