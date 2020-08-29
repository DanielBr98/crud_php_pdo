<?php
require 'connection.php';

class DataBase
{

    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function list()
    {
        try {
            $select = $this->db->prepare("SELECT * FROM contacts ORDER BY name ASC");
            $select->execute();
            return $select;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function user($a)
    {
        try {
            $select = $this->db->prepare("SELECT * FROM contacts WHERE id = :a");
            $select->bindParam(':a', $a);
            $select->execute();
            $array = $select->fetch(PDO::FETCH_ASSOC);
            return $array;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function register($a, $b, $c)
    {
        try {
            $insert = $this->db->prepare("INSERT INTO contacts (name, email, phoneNumber) VALUES (:a, :b, :c)");
            $insert->bindParam(':a', $a);
            $insert->bindParam(':b', $b);
            $insert->bindParam(':c', $c);
            $insert->execute();
            return $insert;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function edit($a, $b, $c, $d)
    {
        try {
            $update = $this->db->prepare("UPDATE contacts SET name = :a, email = :b, phoneNumber = :c WHERE id = :d");
            $update->bindParam(':a', $a);
            $update->bindParam(':b', $b);
            $update->bindParam(':c', $c);
            $update->bindParam(':d', $d);
            $update->execute();
            return $update;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($a)
    {
        try {
            $delete = $this->db->prepare("DELETE FROM contacts WHERE id = :a");
            $delete->bindParam(':a', $a);
            $delete->execute();
            return $delete;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
