wheelHubApp.controller('CarsDetailController', [
	'API_URL',
	'$http',
	'$scope',
	'$routeParams',
	function (API_URL, $http, $scope, $routeParams) {
		$scope.car = null
		$scope.status = 'loading'
		$scope.loadCarDetails = function () {
			const carId = $routeParams.carId
			$http
				.get(API_URL + 'car/get-car/' + carId)
				.then(function (response) {
					if (response.data && response.data.status === 'success') {
						$scope.car = response.data.data
						$scope.status = 'success'
					} else {
						console.error('Error fetching car details:', response.data.message)
						$scope.status = 'error'
					}
				})
				.catch(function (error) {
					console.error('Error fetching car details:', error)
					$scope.status = 'error'
				})
		}

		$scope.loadCarDetails()
	},
])
