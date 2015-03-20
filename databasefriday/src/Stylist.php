<?php
        class Stylist
        {
            private $name
            private $id
            private $client_id

            function __construct($name, $id, $client_id)
            {
                $this->name = $name;
                $this->id = $id;
                $this->client_id = $client_id;
            }

                function setName($new_name)
                {
                    $this->name = $new_name;
                }

                function getName()
                {
                    return $this->name;
                }

                function setId($new_id)
                {
                    $this->id = $new_id;
                }

                function getId()
                {
                    return $this->id;
                }

                function setClientId($new_client_id)
                {
                    $this->client_id = $new_client_id;
                }

                function getClientId()
                {
                    return $this->client_id;
                }

        }








 ?>
