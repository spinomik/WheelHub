wheelHubApp.directive('content', [
	function () {
		return {
			restrict: 'E',
			scope: {
				user: '=',
				showSidenav: '=',
			},
			controller: function ($scope) {},
			templateUrl: '/components/content/content.html',
			link: function (scope, element) {
				element.on('click', function () {
					scope.$apply(function () {
						scope.showSidenav = false
					})
				})
			},
			replace: true,
		}
	},
])
