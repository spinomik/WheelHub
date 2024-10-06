wheelHubApp.directive('sideNav', [
	function () {
		return {
			restrict: 'E',
			scope: {
				showSidenav: '=',
			},
			controller: function ($scope) {},
			templateUrl: '/components/sidenav/sidenav.html',
		}
	},
])
