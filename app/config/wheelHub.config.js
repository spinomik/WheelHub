wheelHubApp.config([
	'$routeProvider',
	function ($routeProvider) {
		$routeProvider
			.when('/', {
				templateUrl: '/views/homePage.html',
				controller: 'HomePageController',
			})
			.otherwise({
				redirectTo: '/',
			})
	},
])
