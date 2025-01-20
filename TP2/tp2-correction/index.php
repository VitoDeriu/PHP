<?php

include('connected.php');

if($connected) {
    include("index_user_connected.php");
} else {
    include("index_user_unknow.php");
}