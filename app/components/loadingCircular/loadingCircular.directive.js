wheelHubApp.directive('loadingCircular', function () {
	return {
		restrict: 'E',
		scope: {
			status: '=',
			onRetry: '&',
		},
		templateUrl: '/components/loadingCircular/loadingCircular.html',
	}
})
