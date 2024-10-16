wheelHubApp.controller('CarsFormController', [
	'API_URL',
	'$http',
	'$scope',
	'$location',
	'$routeParams',
	function (API_URL, $http, $scope, $location, $routeParams) {
		$scope.carBrands = []
		$scope.carModels = []
		$scope.car = {}
		$scope.vinExists = false
		$scope.registerNumberExists = false
		$scope.title = 'Dodaj nowy Pojazd'
		$scope.submitText = 'Dodaj Pojazd'
		if ($routeParams.carId) {
			$scope.title = 'Edytuj Pojazd'
			$scope.submitText = 'Zapisz Pojazd'
			$http.get(API_URL + 'car/get-car/' + $routeParams.carId).then(
				function (response) {
					$scope.loadModels(response.data.data.carBrandId)
					$scope.car = response.data.data
					$scope.formatUppercase()
				},
				function (error) {
					console.error('Error fetching car details:', error)
				}
			)
		}
		$scope.addCar = function (car) {
			if ($routeParams.carId) {
				$http.post(API_URL + 'car/update-car', car).then(
					function (response) {
						if (response.data.status === 'success') {
							alert('Samochód zaktualizowany!')
							$location.path('#!/cars-list')
						} else {
							alert('Błąd podczas edycji samochodu!')
						}
					},
					function (error) {
						console.error('Error updating car:', error)
					}
				)
			} else {
				$http.post(API_URL + 'car/add-car', car).then(function (response) {
					if (response.data.status === 'success') {
						console.log('Car added successfully:', response.data.data)
						var addAnother = confirm('Samochód został dodany pomyślnie. Czy chcesz dodać kolejny samochód?')

						if (addAnother) {
							$scope.car = {}
						} else {
							$location.path('#!/cars-list')
						}
						$scope.car = {}
					} else {
						if (response.data.message.includes('Duplicate entry')) {
							alert('Samochód o podanych danych już istnieje w bazie.')
						} else {
							alert('Wystąpił błąd: ' + response.data.message)
						}
						console.error('Error adding car:', response.data.message)
					}
				})
			}
		}
		$scope.loadBrands = function () {
			$http.get(API_URL + 'car-brands/get-all').then(function (response) {
				if (response.data.status === 'success') {
					$scope.carBrands = response.data.data
				} else {
					console.error('Error fetching car brands:', response.data.message)
				}
			})
		}
		$scope.loadModels = function (brandId) {
			$http.get(API_URL + 'car-models/get-model/' + brandId).then(function (response) {
				if (response.data.status === 'success') {
					$scope.carModels = response.data.data
				} else {
					console.error('Error fetching car models:', response.data.message)
				}
			})
		}
		$scope.checkCarExists = function () {
			if ($routeParams.carId) return
			if ($scope.car.vin || $scope.car.registerNumber) {
				$http
					.post(API_URL + 'car/check-car-exist', {
						vin: $scope.car.vin || '',
						registerNumber: $scope.car.registerNumber || '',
					})
					.then(function (response) {
						if (response.data.exists) {
							if ($scope.car.vin) {
								$scope.vinExists = true
								alert('Samochód o podanym VIN już istnieje w bazie.')
							}
							if ($scope.car.registerNumber) {
								$scope.registerNumberExists = true
								alert('Samochód o podanym numerze rejestracyjnym już istnieje w bazie.')
							}
						} else {
							$scope.vinExists = false
							$scope.registerNumberExists = false
						}
					})
			}
		}
		$scope.onVinBlur = function () {
			$scope.checkCarExists()
			$scope.formatUppercase()
		}
		$scope.onRegisterNumberBlur = function () {
			$scope.checkCarExists()
			$scope.formatUppercase()
		}
		$scope.formatUppercase = function () {
			if ($scope.car.vin) {
				$scope.car.vin = $scope.car.vin.toUpperCase()
			}
			if ($scope.car.registerNumber) {
				$scope.car.registerNumber = $scope.car.registerNumber.toUpperCase()
			}
		}
		$scope.loadBrands()
	},
])
