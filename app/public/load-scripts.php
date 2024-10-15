<?php
$scripts = [
    '/node_modules/angular/angular.js',
    '/node_modules/angular-route/angular-route.js',
    '/node_modules/angular-animate/angular-animate.js',
    '/node_modules/angular-aria/angular-aria.js',
    '/node_modules/angular-messages/angular-messages.js',
    '/node_modules/angular-material/angular-material.js',
    '/js/app.js',
    "https://kit.fontawesome.com/ad4c8b7824.js",
    // Config
    '/config/wheelHub.config.js',
    // Controllers 
    '/controllers/WheelHubController.js',
    '/controllers/HomePageController.js',
    '/controllers/CarsListController.js',
    '/controllers/SettingsPageController.js',
    '/controllers/LoginController.js',
    '/controllers/RegisterController.js',
    '/controllers/CalendarController.js',
    '/controllers/MyRentsController.js',
    '/controllers/RentCarController.js',
    '/controllers/CarsFormController.js',
    '/controllers/CarsDetailController.js',

    // Services
    'services/AuthServices.js',
    // Components
    '/components/container/container.directive.js',
    '/components/content/content.directive.js',
    '/components/sidenav/sidenav.directive.js',
    '/components/toolbar/toolbar.directive.js',
];

foreach ($scripts as $script) {
    echo '<script src="' . $script . '"></script>';
}
