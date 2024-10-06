wheelHubApp.directive('sideNav', [
	function () {
		return {
			restrict: 'E',
			scope: {
				showSidenav: '=',
				activePage: '=',
				user: '=',
			},
			controller: function ($scope) {},
			templateUrl: '/components/sidenav/sidenav.html',
		}
	},
])
