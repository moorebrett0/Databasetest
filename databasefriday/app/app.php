<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application();

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/tasks", function() use ($app) {
        return $app['twig']->render('stylist.html.twig', array('tasks' => Task::getAll()));
    });

    $app->post("/tasks", function() use ($app) {
        $task = new Task($_POST['description']);
        $task->save();
        return $app['twig']->render('stylist.html.twig', array('tasks' => Task::getAll()));
    });

...

    $app->get("/categories", function() use ($app) {


?>
