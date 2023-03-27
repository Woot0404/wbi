<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wbi";
        
    // $username = "u966834465_wbi";
    // $password = "MySQL@wbi110";
    // $dbname = "u966834465_wbi";


    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn -> connect_error){
        die("Connection Failed : ". $conn -> connect_error);
    }
?>