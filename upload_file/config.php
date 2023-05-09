<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'myDB';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connected Fail: " . mysqli_connect_error());
}
