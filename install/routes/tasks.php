<?php

use Bitrix\Main\Routing\Controllers\PublicPageController;
use Bitrix\Main\Routing\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

	$routes->get('/', new PublicPageController('/local/modules/up.tasks/views/task-list.php'));
	$routes->get('/tasks/', new PublicPageController('/local/modules/up.tasks/views/tasks-list.php'));
	$routes->get('/tasks/create/', new PublicPageController('/local/modules/up.tasks/views/task-create.php'));

	// $routes->post('/tasks/create/', function () {
	// 	var_dump($_POST);
	// });

	$routes->post('/tasks/create/', new PublicPageController('/local/modules/up.tasks/views/task-create.php'));
};