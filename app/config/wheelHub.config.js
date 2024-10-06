wheelHubApp.config([
	'$routeProvider',
	function ($routeProvider) {
		$routeProvider
			.when('/homePage', {
				templateUrl: '/views/homePage.html',
				controller: 'HomePageController',
			})
			.when('/carsList', {
				templateUrl: '/views/carsList.html',
				controller: 'CarsListController',
			})
			.when('/settings', {
				templateUrl: '/views/settingsPage.html',
				controller: 'SettingsPageController',
			})
			.when('/login', {
				templateUrl: '/views/loginPage.html',
				controller: 'LoginController',
			})
			.when('/register', {
				templateUrl: '/views/registerPage.html',
				controller: 'RegisterController',
			})
			.otherwise({
				redirectTo: '/homePage',
			})
	},
])
