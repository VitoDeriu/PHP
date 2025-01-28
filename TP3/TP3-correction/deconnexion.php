<?php
include_once("connected.php");

session_unset();
session_destroy();
setcookie(session_name(), "", strtotime("-1 day"));


header('Location:index.php');