<?php
extract($_POST);
extract($_GET);

if (isset($form)) {

    require 'model.php';
    $dataBase = new DataBase($conn);
    session_start();

    switch ($target) {

        case "register":

            $insert = $dataBase->register($name, $email, $phoneNumber);
            if ($insert == true) {
                $_SESSION['msg'] = "<p id='p1'>Data sent successfully!</p>";
                header("Location: ../index.php?page=register");
            } else {
                $_SESSION['msg'] = "<p id='p2'>Try again!</p>";
                header("Location: ../index.php?page=register");
            }

            break;

        case "edit":

            $update = $dataBase->edit($name, $email, $phoneNumber, $id);
            if ($update == true) {
                $_SESSION['msg'] = "<p id='p1'>Data sent successfully!</p>";
                header("Location: ../index.php?page=edit&id=$id");
            } else {
                $_SESSION['msg'] = "<p id='p2'>Try again!</p>";
                header("Location: ../index.php?page=edit&id=$id");
            }

            break;

        case "deleteUser":

            $delete = $dataBase->delete($id);
            if ($delete == true) {
                $_SESSION['msg'] = "<p id='p1'>Data deleted successfully!</p>";
                header("Location: ../index.php?page=list");
            } else {
                $_SESSION['msg'] = "<p id='p2'>Try again!</p>";
                header("Location: ../index.php?page=list");
            }

            break;

        default:
            header("Location: ../index.php");
    }
} elseif (isset($page) || @$page == '') {

    @$pagina = $page;
    if ($pagina == '' || $pagina == 'index.php') {
        include('list.php');
    } elseif (file_exists($pagina . '.php')) {
        include($pagina . '.php');
    }
} else {
    header('Location: ../index.php');
}
