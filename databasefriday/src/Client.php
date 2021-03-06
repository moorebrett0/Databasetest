<?php

    class Client
    {
        private $client;
        private $id;

        function __construct($client, $id = null)
        {
            $this->client = $client;
            $this->id = $id;
        }

        function setClient($new_client)
        {
            $this->client = (string) $new_client;
        }

        function getClient()
        {
            return $this->client;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {

            $statement = $GLOBALS['DB']->query("INSERT INTO client (client) VALUES ('{$this->getClient()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }
        function update($new_client)
        {
            $GLOBALS['DB']->exec("UPDATE client SET name = '{$new_client}' WHERE id = {$this->getId()};");
            $this->setClient($new_client);
        }

            function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM client WHERE id = {$this->getId()};");
        }


      static function getAll()
        {
            $all_clients = $GLOBALS['DB']->query("SELECT * FROM client;");
            $clients_to_return = array();
            foreach($all_clients as $client) {
                $name = $client['client'];
                $id = $client['id'];
                $new_clients = new Client($name, $id);
                array_push($clients_to_return, $new_clients);
            }
            return $clients_to_return;
        }

    static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM client *;");
        }

        static function find($client_search_id)
        {
            $found_client = null;
            $clients = Stylist::getAll();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if ($client_id == $client_search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

        function getStylists()
        {
            $stylists = Array();
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist WHERE client_id = {$this->getId()};");
            foreach($returned_stylists as $stylist) {
                $name = $stylist['name'];
                $id = $stylist['id'];
                $client_id = $stylist['client_id'];
                $new_Stylist = new Stylist($name, $id, $client_id);
                array_push($stylists, $new_Stylist);
            }
            return $stylists;
        }


    }





 ?>
