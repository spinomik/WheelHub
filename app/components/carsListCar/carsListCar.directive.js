wheelHubApp.directive('carsListCar', function () {
	return {
		restrict: 'E',
		scope: {
			car: '=',
			onDelete: '&',
		},
		templateUrl: '/components/carsListCar/carsListCar.html',
	}
})
