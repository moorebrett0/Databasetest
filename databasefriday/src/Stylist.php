<?php
        class Stylist
        {
            private $name;
            private $id;
            private $client_id;

            function __construct($name, $id = null, $client_id)
            {
                $this->name = $name;
                $this->id = $id;
                $this->client_id = $client_id;


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
                    $statement = $GLOBALS['DB']->query("INSERT INTO stylist (name, client_id) VALUES ('{$this->getName()}', {$this->getClientId()}) RETURNING id;");
                    $result = $statement->fetch(PDO::FETCH_ASSOC);
                    $this->setId($result['id']);
                }

                function delete()
                {
            $GLOBALS['DB']->exec("DELETE FROM stylist WHERE id = {$this->getId()};");
                }

                static function getAll()
                {
                    $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist;");
                    $stylists = array();
                    foreach($returned_stylists as $stylist) {
                        $name = $stylist['name'];
                        $id = $stylist['id'];
                        $client_id = $stylist['client_id'];
                        $new_stylist = new Stylist($name, $id, $client_id);
                        array_push($stylists_to_return, $new_stylist);
                    }
                    return $stylists;
                }

                static function deleteAll()
                {
                    $GLOBALS['DB']->exec("DELETE FROM stylist *;");
                }

                static function find($search_id)
                {
                    $found_stylist = null;
                    $stylists = Stylist::getAll();
                    foreach($stylists as $stylist) {
                        $stylist_id = $stylist->getId();
                        if ($stylist_id == $search_id) {
                            $found_stylist = $stylist;
                        }
                    }
                    return $found_stylist;
                }

                function findClients()
                {
                    $found_clients = array();
                    $table_matches = $GLOBALS['DB']->query("SELECT * FROM stylist WHERE client_id = {$this->getId()};");
                    foreach($table_matches as $row) {
                        $name = $row['name'];
                        $id = $row['id'];
                        $cuisine_id = $row['client_id'];
                        $new_clients = new Client($name, $id, $client_id);
                        array_push($found_clients, $new_clients);
                }
                return $found_clients;
                        }
        }








 ?>
