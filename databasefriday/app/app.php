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

      
