wheelHubApp.directive('container', [
	function () {
		return {
			restrict: 'E',
			scope: {
				showSidenav: '=',
				activePage: '=',
				user: '=',
			},
			controller: function ($scope) {},
			templateUrl: '/components/container/container.html',
			replace: true,
		}
	},
])
