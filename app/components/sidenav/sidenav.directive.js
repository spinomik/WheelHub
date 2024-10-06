wheelHubApp.directive('sideNav', [
	function () {
		return {
			restrict: 'E',
			scope: {
				showSidenav: '=',
				user: '=',
			},
			controller: function ($scope) {},
			templateUrl: '/components/sidenav/sidenav.html',
		}
	},
])
