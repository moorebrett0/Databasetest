<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

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

        function test_save()
        {
            //Arrange
            $name = "Cherise";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $test_stylist->save();

            //Assert
            $result = Stylist::getAll();
            $this->assertEquals($test_stylist, $result[0]);
        }


        function test_getAll()
        {
            //Arrange
            $name = "Cherise";
            $id = 1;
            $test_Stylist = new Stylist($name, $id);
            $name = "connie";
            $id = 1;
            $test_Stylist2 = new Stylist($name, $id);


            //act
            $test_Stylist->save();
            $test_Stylist2->save();



            //Assert
            $result = Stylist::getAll();
            $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "cherise";
            $name2 = "connie";
            $id = null;
            $test_Stylist = new Stylist($name, $id);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($name2, $id);
            $test_Stylist2->save();

            //Act
            Stylist::deleteAll();

            //Assert
            $result = Stylist::getAll();
            $this->assertEquals([], $result);
        }
        function test_find()
        {
            //Arrange
            $name = "cherise";
            $id = null;
            $name2 = "connie";
            $test_Stylist = new Stylist($name, $id);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($name2, $id);
            $test_Stylist2->save();

            //Act
            $result = Stylist::find($test_Stylist->getId());

            //Assert
            $this->assertEquals($test_Stylist, $result);
        }

            }
?>
