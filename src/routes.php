<?php

$app->get('/', ['\App\Controllers\HomeController', 'index']);

$app->get('/capacities', ['\App\Controllers\CapacitiesController', 'index']);

$app->get('/capacities/{id}', ['\App\Controllers\CapacitiesController', 'getPlace']);