<?php
extract($_POST);
extract($_GET);

if (isset($form)) {

    require '../model/Model.php';
    session_start();

    switch ($target) {

        case "register":

            $insert = Model::register($name, $email, $phoneNumber);
            if ($insert == true) {
                $_SESSION['msg'] = "<p id='p1'>Data sent successfully!</p>";
                header("Location: $_SERVER[HTTP_REFERER]");
            } else {
                $_SESSION['msg'] = "<p id='p2'>Try again!</p>";
                header("Location: $_SERVER[HTTP_REFERER]");
            }

            break;

        case "edit":

            $update = Model::edit($name, $email, $phoneNumber, $id);
            if ($update == true) {
                $_SESSION['msg'] = "<p id='p1'>Data sent successfully!</p>";
                header("Location: $_SERVER[HTTP_REFERER]");
            } else {
                $_SESSION['msg'] = "<p id='p2'>Try again!</p>";
                header("Location: $_SERVER[HTTP_REFERER]");
            }

            break;

        case "deleteUser":

            $delete = Model::delete($id);
            if ($delete == true) {
                $_SESSION['msg'] = "<p id='p1'>Data deleted successfully!</p>";
                header("Location: $_SERVER[HTTP_REFERER]");
            } else {
                $_SESSION['msg'] = "<p id='p2'>Try again!</p>";
                header("Location: $_SERVER[HTTP_REFERER]");
            }

            break;

        default:

            header("Location: index.php");
    }
} else {

    header('Location: index.php');
}
