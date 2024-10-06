wheelHubApp.directive('content', [
	function () {
		return {
			restrict: 'E',
			scope: {},
			controller: function ($scope) {},
			templateUrl: '/components/content/content.html',
			replace: true,
		}
	},
])
