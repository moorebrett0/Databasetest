<?php
        class Stylist
        {
            private $name;
            private $id;
            private $client_id;

            function __construct($name, $id = null)
            {
                $this->name = $name;
                $this->id = $id;

            }

                function setName($new_name)
                {
                    $this->name = (string) $new_name;
                }

                function getName()
                {
                    return $this->name;
                }

                function setId($new_id)
                {
                    $this->id = (int) $new_id;
                }

                function getId()
                {
                    return $this->id;
                }

                function setClientId($new_client_id)
                {
                    $this->client_id = (int) $new_client_id;
                }

                function getClientId()
                {
                    return $this->client_id;
                }
                function save()
                {
                $statement = $GLOBALS['DB']->query("INSERT INTO stylist (name) VALUES ('{$this->getName()}') RETURNING id;");
                         $result = $statement->fetch(PDO::FETCH_ASSOC);
                         $this->setId($result['id']);
                }

                static function getAll()
                {
                    $returned_names = $GLOBALS['DB']->query("SELECT * FROM stylist;");
                    $stylists = array();
                    foreach($returned_names as $stylist) {
                        $name = $sylist['name'];
                        $new_stylist = new Stylist($name);
                        array_push($stylists, $new_stylist);
                    }
                    return $stylists;
                }
        }








 ?>
