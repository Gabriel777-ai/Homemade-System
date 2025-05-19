<?php
    require_once __DIR__ . '/../config-helper.php';
    require_once __DIR__ . '/../config-names.php';

    $dbname = config('database.name');
    $dbhost = config('database.host');
    $dbport = config('database.port');
    $dbusername = config('database.user');
    $dbpassword = config('database.password');

    $connections = new mysqli($dbhost, $dbusername, $dbpassword, $dbname, $dbport);

    if(mysqli_connect_error()){
        die("Cant connect to $dbname: " . mysqli_connect_error());
    }
	$connections->select_db($dbname);