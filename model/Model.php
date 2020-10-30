<?php
@isset($target) ? require '../mysql/Connect.php' : require 'mysql/Connect.php';

class Model extends Connect
{

    static function list()
    {
        try {
            $select = self::conn()->prepare("SELECT * FROM contacts ORDER BY name ASC");
            $select->execute();
            return $select;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    static function user($a)
    {
        try {
            $select = self::conn()->prepare("SELECT * FROM contacts WHERE id = :a");
            $select->bindParam(':a', $a);
            $select->execute();
            $array = $select->fetch(PDO::FETCH_ASSOC);
            return $array;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    static function register($a, $b, $c)
    {
        try {
            $insert = self::conn()->prepare("INSERT INTO contacts (name, email, phoneNumber) VALUES (:a, :b, :c)");
            $insert->bindParam(':a', $a);
            $insert->bindParam(':b', $b);
            $insert->bindParam(':c', $c);
            $insert->execute();
            return $insert;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    static function edit($a, $b, $c, $d)
    {
        try {
            $update = self::conn()->prepare("UPDATE contacts SET name = :a, email = :b, phoneNumber = :c WHERE id = :d");
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

    static function delete($a)
    {
        try {
            $delete = self::conn()->prepare("DELETE FROM contacts WHERE id = :a");
            $delete->bindParam(':a', $a);
            $delete->execute();
            return $delete;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
