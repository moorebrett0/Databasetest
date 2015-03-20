<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
        }

        function test_getClient()
        { //can I get the name?
            //Arrange
            $client = "sarah";
            $id = 1;
            $test_client = new Client($client, $id);

            //Act
            $result = $test_client->getClient();

            //Assert
            $this->assertEquals($client, $result);

        }
        function test_setClient()
        { //can I get the name?
            //Arrange
            $client = "sarah";
            $id = 1;
            $test_client = new Client($client, $id);

            //Act
            $test_client->setClient("rachel");
            $result = $test_client->getClient();

            //Assert
            $this->assertEquals("rachel", $result);

        }

        function test_save()
        {
            //Arrange
            $client = "sarah";
            $id = 1;
            $test_client = new Client($client, $id);

            //Act
            $test_client->Save();

            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);

        }

        function test_getAll()
        {
            //arrange
            $client = 'sarah';
            $id= 1;
            $test_client = new Client($client, $id);

            $client2 = 'rachael';
            $id = 1;
            $test_client2 = new Client($client, $id);


            //Act
            $test_client->Save();
            $test_client2->Save();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([$test_client, $test_client2], $result);

        }

        function test_deleteAll()
        {
            //arrange
            $client = 'sarah';
            $id= 1;
            $test_client = new Client($client, $id);

            $client2 = 'rachael';
            $id = 1;
            $test_client2 = new Client($client, $id);


            //Act
            $test_client->Save();
            $test_client2->Save();
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);

        }

        function test_delete()
        {
            //Arrange
            $client = 'sarah';
            $id= 1;
            $test_client = new Client($client, $id);
            $test_client->save();

            $client2 = 'rachael';
            $id = 1;
            $test_client2 = new Client($client, $id);
            $test_client2->save();

            //Act
            $test_client->delete();

            //assert
            $this->assertEquals([$test_client2], Client::getAll());
        }

    }






 ?>
