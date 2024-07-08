<?php
declare(strict_types=1);

use App\Application\Actions\VehicleMake\ListVehicleMakesAction;
use App\Application\Actions\VehicleMake\ViewVehicleMakesAction;
use App\Application\Actions\VehicleModel\ListVehicleModelsByMakeAction;
use App\Application\Actions\Vehicle\ListVehicleYearsAction;
use App\Application\Actions\Vehicle\ListVehiclesAction;
use App\Application\Actions\Vehicle\UpdateVehicleCoverageAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use PsrJwt\Factory\JwtMiddleware;
 
return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello candidate! Good luck for the test and happy coding =P');
        return $response;
    });

    $app->group('/api', function (Group $group) {
        $group->get('/vehicle-makes', ListVehicleMakesAction::class);
        $group->get('/vehicle-makes/{id}', ViewVehicleMakesAction::class);
        $group->get('/vehicle-makes/{id}/models', ListVehicleModelsByMakeAction::class);
        $group->get('/vehicle-years', ListVehicleYearsAction::class);
        $group->get('/vehicle-list', ListVehiclesAction::class);
        $group->get('/vehicle-update/{model_id}/{year}/{state}', UpdateVehicleCoverageAction::class);
    })->add(JwtMiddleware::json('Secret123!456$', 'jwt', ['Authorisation Failed']));
};
