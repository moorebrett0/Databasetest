<?php
        class Stylist
        {
            private $name;
            private $id;


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

                function delete()
                {
            $GLOBALS['DB']->exec("DELETE FROM stylist WHERE id = {$this->getId()};");
                }

                static function getAll()
                {
                    $all_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist;");
                    $stylists_to_return = array();
                    foreach($all_stylists as $stylist) {
                        $name = $stylist['name'];
                        $id = $stylist['id'];
                        $new_stylist = new Stylist($name, $id);
                        array_push($stylists_to_return, $new_stylist);
                    }
                    return $stylists_to_return;
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
        }








 ?>
