wheelHubApp.controller('CarsListController', [
	'API_URL',
	'$http',
	'$scope',
	function (API_URL, $http, $scope) {
		$scope = $scope
		$scope.sortReverse = false
		$scope.cars = []
		$scope.status = 'loading'
		$scope.toggleSort = function () {
			$scope.sortReverse = !$scope.sortReverse
		}
		$scope.loadCars = function () {
			$scope.status = 'loading'
			$http
				.get(API_URL + 'car/get-cars')
				.then(function (response) {
					if (response.data && response.data.status === 'success') {
						$scope.cars = response.data.data
						$scope.status = 'success'
					} else {
						console.error('Error fetching cars:', response.data.message)
						$scope.status = 'error'
					}
				})
				.catch(function (error) {
					console.error('Error fetching cars:', error)
					$scope.status = 'error'
				})
		}
		$scope.confirmDelete = function (carId) {
			if (confirm('Czy na pewno chcesz usunąć ten rekord?')) {
				$http
					.delete(API_URL + 'car/delete/' + carId)
					.then(function (response) {
						if (response.data.status === 'success') {
							$scope.cars = $scope.cars.filter(car => car.id !== carId)
							alert('Rekord został pomyślnie usunięty.')
						} else {
							alert('Wystąpił błąd podczas usuwania rekordu.')
						}
					})
					.catch(function (error) {
						alert('Wystąpił błąd: ' + error.message)
					})
			}
		}
		$scope.loadCars()
	},
])
