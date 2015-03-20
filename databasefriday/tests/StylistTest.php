<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

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
            $client = "tara";
            $id = null;
            $test_client = new Client($client, $id);
            $test_client->save();


            $name = "cherise";
            $client_id = $test_client->getId();
            $test_stylist = new Stylist($name, $id, $client_id);
            $test_stylist->save();

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));

        }

        function test_getClientId()
        {
            $client = "tara";
            $id = null;
            $test_client = new Client($client, $id);
            $test_client->save();


            $name = "cherise";
            $client_id = $test_client->getId();
            $test_stylist = new Stylist($name, $id, $client_id);
            $test_stylist->save();

            //Act
            $result = $test_stylist->getClientId();

            //Assert
            $this->assertEquals(true, is_numeric($result));

        }

        function test_setId()
        {
            //Arrange
            $client = "cherise";
            $id = null;
            $test_client = new Client($client, $id);
            $test_client->save();

            $name = "lola";
            $client_id = $test_client->getId();
            $test_stylist = new Stylist($name, $id, $client_id);
            $test_stylist->save();

            //Act
            $test_stylist->setId(2);

            //Assert
            $result = $test_stylist->getId();
            $this->assertEquals(2, $result);
        }

        function test_save()
        {
            //Arrange
            $client = "Home stuff";
            $id = null;
            $test_client = new Client($client, $id);
            $test_client->save();

            $name = "Wash the dog";
            $client_id = $test_client->getId();
            $test_task = new Stylist($name, $id, $client_id);

            //Act
            $test_task->save();

            //Assert
            $result = Stylist::getAll();
            $this->assertEquals($test_task, $result[0]);
        }


        function test_getAll()
        {
            //Arrange
            $client = "Cherise";
            $id = null;
            $test_Stylist = new Client($client, $id);
            $test_Stylist->save();

            $name = "connie";
            $client_id = $test_Stylist->getId();
            $test_Stylist = new Stylist($name, $id, $client_id);
            $test_Stylist->save();

            $name2 = "connie";
            $test_Stylist2 = new Stylist($name2, $id, $client_id);
            $test_Stylist2->save();


            //act
            $result = Stylist::getAll();


            //Assert

            $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
        }
        function test_deleteAll()
        {
            //Arrange
            $client = "erica";
            $id = null;
            $test_client = new Client($client, $id);
            $test_client->save();

            $name = "cherise";
            $client_id = $test_client->getId();
            $test_stylist = new Stylist($name, $id, $client_id);
            $test_stylist->save();

            $name2 = "shantell";
            $test_stylist2 = new Stylist($name2, $id, $client_id);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();

            //Assert
            $result = Stylist::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            $client = "leslie";
            $id = null;
            $test_client = new Client($client, $id);
            $test_client->save();

            $name = "tanya";
            $client_id = $test_client->getId();
            $test_stylist = new Stylist($name, $id, $client_id);
            $test_stylist->save();

            $name2 = "danielle";
            $test_stylist2 = new Stylist($name2, $id, $client_id);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }
        // function test_find()
        // {
        //     //Arrange
        //     $name = "cherise";
        //     $id = null;
        //     $name2 = "connie";
        //     $test_Stylist = new Stylist($name, $id, $client_id);
        //     $test_Stylist->save();
        //     $test_Stylist2 = new Stylist($name2, $id, $client_id);
        //     $test_Stylist2->save();
        //
        //     //Act
        //     $result = Stylist::find($test_Stylist->getId());
        //
        //     //Assert
        //     $this->assertEquals($test_Stylist, $result);
        //
        //
        // }

            }
?>
