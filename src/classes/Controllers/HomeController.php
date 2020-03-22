<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Models\Nuitees;
use App\Models\Origine;

class HomeController
{
    public function index(Request $request, Response $response, View $view, Origine $origine, Nuitees $nuitees)
    {
        $data = [];

        $resultat = $origine->getCountAll();
        $org    = json_encode($origine->getOrigineTouriste());
        $dest   = $origine->getDestinationTouriste();
        $volume = $origine->getOrgDest();

        /*
        $org   = json_encode($origine->getDestinationTouriste());

        // echo ($org);
        $org = str_replace ( "{\"dest\":" , "[" , $org);
        $org = str_replace ( ",\"origine\":\"" , "," , $org);
        $org = str_replace ( "\"}" , "]" , $org);
        $org = str_replace ( '"' , "'" , $org);
        echo ($org); die;
*/

        return $view->render($response, 'home.twig', [
            'org' => $org,
            'dest' => $dest,
            'volume' => $volume,
        ]);
    }
}