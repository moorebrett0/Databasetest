<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        function test_getName()
        { //can I get the name?
            //Arrange
            $name = "cherise";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);

        }
        function test_setName()
        { //can I get the name?
            //Arrange
            $name = "cherise";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $test_stylist->setName("claire");
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals("claire", $result);

        }
        // function test_save()
        // {
        //     //Arrange
        //     $name = "Cherise";
        //     $test_stylist = new Stylist($name);
        //
        //     //Act
        //     $test_stylist->save();
        //
        //     //Assert
        //     $result = Stylist::getAll();
        //     $this->assertEquals($test_stylist, $result[0]);
        // }
        //
        //
        // function test_getAll()
        // {
        //     //Arrange
        //     $name = "Cherise";
        //     $name2 = "Connie";
        //     $id = 1;
        //
        //     $test_Stylist = new Stylist($name, $id);
        //     $test_Stylist->save();
        //     $test_Stylist2 = new Stylist($name2, $id);
        //     $test_Stylist2->save();
        //
        //
        //     //Act
        //     $result = Stylist::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
        // }
        //

            }
?>
