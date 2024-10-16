<!doctype html>
<html ng-app="wheelHubApp">

<head>
    <title>WheelHub</title>
    <link rel="stylesheet" href="/node_modules/angular-material/angular-material.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- imports Scripts  -->
    <?php require_once 'load-scripts.php'; ?>
</head>

<body ng-controller="WheelHubController" layout="column">
    <div flex>
        <toolbar class="toolbar" show-sidenav="showSidenav"></toolbar>
        <container
            show-sidenav="showSidenav"
            active-page="activePage"
            user="user">
        </container>
    </div>
</body>

</html>