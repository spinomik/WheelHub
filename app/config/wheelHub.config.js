wheelHubApp.config([
	'$routeProvider',
	function ($routeProvider) {
		$routeProvider
			.when('/home', {
				templateUrl: '/views/homePage.html',
				controller: 'HomePageController',
			})
			.when('/cars-list/add', {
				templateUrl: '/views/carsFormPage.html',
				controller: 'CarsFormController',
			})
			.when('/cars-list/edit/:carId', {
				templateUrl: '/views/carsFormPage.html',
				controller: 'CarsFormController',
			})
			.when('/cars-list/detail/:carId', {
				templateUrl: '/views/carsDetailPage.html',
				controller: 'CarsDetailController',
			})
			.when('/cars-list', {
				templateUrl: '/views/carsListPage.html',
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
			.when('/logout', {
				templateUrl: '/views/loginPage.html',
				controller: 'LoginController',
				resolve: {
					logout: function (AuthService) {
						AuthService.logout()
					},
				},
			})
			.when('/register', {
				templateUrl: '/views/registerPage.html',
				controller: 'RegisterController',
			})
			.when('/calendar', {
				templateUrl: '/views/calendarPage.html',
				controller: 'CalendarController',
			})
			.when('/my-rents', {
				templateUrl: '/views/myRentsPage.html',
				controller: 'MyRentsController',
			})
			.when('/rent-car', {
				templateUrl: '/views/rentCarPage.html',
				controller: 'RentCarController',
			})
			.otherwise({
				redirectTo: '/home',
			})
	},
])
