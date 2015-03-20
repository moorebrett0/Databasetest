<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=restaurants_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {

    }
