<?php

    $database= new mysqli("localhost","root","Mbuluku@0022","edoc");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>