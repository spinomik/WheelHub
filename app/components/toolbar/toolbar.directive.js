wheelHubApp.directive('toolbar', [
	function () {
		return {
			restrict: 'E',
			scope: {
				showSidenav: '=',
			},
			controller: function ($scope) {},
			templateUrl: 'components/toolbar/toolbar.html',
			replace: true,
		}
	},
])
