<?php

    $database= new mysqli("localhost","root","Mbuluku@0022","edoc");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    } 
    date_default_timezone_set('Asia/Kolkata');
    $today = date('Y-m-d');
    $patientrow = $database->query("select  * from  patient;");
    $doctorrow = $database->query("select  * from  doctor;");
    $allappo=$database->query("select * from appointment");
    
    $data = [
        'doctorCount' => $doctorrow->num_rows,
        'patientCount' => $patientrow->num_rows,
        'appointmentCount' => $allappo->num_rows
    ];
    
    header('Content-Type: application/json');
    echo json_encode($data);
    ?>