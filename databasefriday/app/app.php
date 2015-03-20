<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application();
    $app['debug']=true;



    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    // all of my  routes.


    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/stylists", function() use ($app) {
    return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/clients", function() use ($app) {
        return $app['twig']->render('clients.html.twig', array('categories' => Client::getAll()));
    });

    $app->post("/stylists", function() use ($app) {
        $stylists = new Stylist($_POST['name'], $_POST['client_id']);


        $stylists->save();


        return $app['twig']->render('stylists.twig', array('stylists' => $stylists->getName()));
    });

    $app->post("/delete_stylist", function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('index.twig');
    });

    return $app;



?>
