<?php

    $host = "localhost";
    $dbName = "attendance";
    $user = "root";
    $pass = "";

    $link = new mysqli($host,$user,$pass,$dbName);

    if($link){
        echo "connection establish successfully";
    }else{
        echo "error"; 
    }
