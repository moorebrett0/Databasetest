<?php

    class Client
    {
        private $clientname;
        private $id;

        function __construct($client, $id = null)
        {
            $this->$client;
            $this->$id;
        }

        function setClient($new_client)
        {
            $this->client = (string) $new_client;
        }

        function getClient()
        {
            return $this->client_name;
        }

        function setId()
        {
            $this->id = (int) $new_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
            {
                // $GLOBALS['DB']->exec("INSERT INTO cuisines (name) VALUES ('{$this->getName()}');");
                $statement = $GLOBALS['DB']->query("INSERT INTO client (client) VALUES ('{$this->getClient()}') RETURNING id;");
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $this->setId($result['id']);
            }


    }





 ?>
