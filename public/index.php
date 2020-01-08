<?php

$app_base_path = '/3_study/4_php/study_005_slim/3_slimApp/public';
//
require __DIR__ . '/../vendor/autoload.php';


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
//
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;
use Slim\Exception\HttpNotFoundException as HttpNotFoundException;
//
//require __DIR__.'/util_up.php';

require 'util/util_up.php';
require 'util/util_model.php';
use App\Util\UtilUp as UtilUp;
use App\Util\UtilModel as UtilModel;

// RedBeanPHP ORM
require __DIR__ . '/../vendor/z_redbeanphp/rb.php';
/*
R::setup();
R::useFeatureSet( 'novice/latest' );
*/

//
$app = AppFactory::create();
$app->setBasePath( $app_base_path );
//



// ============= Enabling CORS ===============
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
// ============= Enabling CORS / ==============

// The RoutingMiddleware should be added after our CORS middleware so routing is performed first
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);
//
$app->get('/', function (Request $request, Response $response, $args) {
    
    /*
    //RedBeanPHP
    //R::setup(); //SQLite
    R::setup( 'mysql:host=localhost;dbname=my_red_bean_php_database', 'app_user', 'app_pw' );
    //R::useFeatureSet( 'novice/latest' );
    $post = R::dispense( 'post' );
    $post->title = 'My holiday';
    $id = R::store( $post );
    */

    $utilModel = new UtilModel(R);
    $utilModel->saveTest();


    // Returning JSON
    $data = array('name' => 'Bob', 'age' => 40);
		$payload = json_encode($data);
		$response->getBody()->write($payload);
		return $response
          ->withHeader('Content-Type', 'application/json');
});

// The routes
//
$app->get('/a/', function (Request $request, Response $response, $args) {
    $utilUp = new UtilUp();
    $response->getBody()->write( $utilUp->info() );
    return $response
                ->withHeader('Content-Type', 'application/json');
});



// ======================= API : 0.1.0 =============================
$app->group('/api/v0/', function (RouteCollectorProxy $group) {
    $group->get('c/', function ($request, $response, $args) {
    	$data = array(
						'name' => 'api', 
						'version' => '0.0.0',
						'path' => '/api/v0/c/'
					);
		$payload = json_encode($data);
		$response->getBody()->write($payload);
		//	
		return $response
          ->withHeader('Content-Type', 'application/json');
    });
    $group->get('d/', function ($request, $response, $args) {
    	$response->getBody()->write('/b/d/');
    	return $response;
    });
    $group->get('e/', function ($request, $response, $args) {
    	$response->getBody()->write('/b/e/');
    	return $response;
    });
    // /api/v0/user/add/
    // ============== User ==============
    $group->group('user/', function (RouteCollectorProxy $group) {
        $group->get('add/', function ($request, $response, $args) {
            /*
            $response->getBody()->write('User : Add');
            return $response;
            */

            $utilModel = new UtilModel(R);
            $newUserID = $utilModel->createUser();

            $response->getBody()->write( 'New User id='.$newUserID );
            return $response; 
        });
        $group->get('update/', function ($request, $response, $args) {
            $response->getBody()->write('User : Update');
            return $response;
        });
        $group->get('delete/', function ($request, $response, $args) {
            $response->getBody()->write('User : Delete');
            return $response;
        });
    });
    // ============== User / ==============
    // ============== Meeting ==============
    $group->group('meeting/', function (RouteCollectorProxy $group) {
        $group->get('add/', function ($request, $response, $args) {
            /*
            $response->getBody()->write('Meeting : Add');
            return $response;
            */
            //
            $utilModel = new UtilModel(R);
            $newMeetingID = $utilModel->createMeeting();
            $response->getBody()->write( 'New Meeting id='.$newMeetingID );
            return $response;
            //
        });
        $group->get('update/', function ($request, $response, $args) {
            $response->getBody()->write('Meeting : Update');
            return $response;
        });
        $group->get('delete/', function ($request, $response, $args) {
            $response->getBody()->write('Meeting : Delete');
            return $response;
        });
    });
    // ============== Meeting / ==============
    // ============== Present ==============
    $group->group('present/', function (RouteCollectorProxy $group) {
        $group->get('mark/', function ($request, $response, $args) {
            $utilModel = new UtilModel(R);
            $newMeetingID = $utilModel->markPresent( 1, 1 );
            $response->getBody()->write( 'New Presnt id='.$newMeetingID );
            return $response;
        });
    });
    // ============== Present / ==============
    
});
// ======================= API : 0.1.0 / =============================
//
$app->group('/api/db/v1/', function (RouteCollectorProxy $group) {
    $group->get('hi1/', function ($request, $response, $args) {
        $response->getBody()->write('api / db / v1 / h1 /');
        return $response;
    });
    $group->get('hi2/', function ($request, $response, $args) {
        $response->getBody()->write( 'api / db / v1 / hi2 /' );
        return $response;
    });
});






/**
 * Catch-all route to serve a 404 Not Found page if none of the routes match
 * NOTE: make sure this route is defined last
 */

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});


//
$app->run();




















































