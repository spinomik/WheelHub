wheelHubApp.directive('content', [
	function () {
		return {
			restrict: 'E',
			scope: {
				user: '=',
			},
			controller: function ($scope) {},
			templateUrl: '/components/content/content.html',
			replace: true,
		}
	},
])
