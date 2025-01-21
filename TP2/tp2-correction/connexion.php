<?php
include_once('connected.php');

if($connected) {
    header('location:index.php');
}

    if(isset($_POST['name']) && !empty($_POST["name"])) {
        $name = htmlspecialchars($_POST["name"]);
        $_SESSION["username"] = $name;
        header('location:index.php');
    } else {
       header('location:login.php');
    }
?>
