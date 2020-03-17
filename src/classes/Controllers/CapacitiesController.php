<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Capacities as Capacities;

class CapacitiesController
{
    public function index(Request $request, Response $response, View $view, Capacities $place)
    {
        $result = $place->getPlaceList();

        return $view->render($response, 'capacities.twig', array('capacities' => $result));
    }

    public function getPlace(Request $request, Response $response, View $view, Capacities $place)
    {
        $id = $request->getAttribute('route')->getArgument('id');

        $result = $place->getPlace($id);

        return $view->render($response, 'capacities.twig', array('capacity' => $result));
    }
}