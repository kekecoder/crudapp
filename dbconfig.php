<?php

$server = 'localhost';
$dbname = 'kekecoder';
$user = 'root';
$pass = 'jerusalem';

try {
  $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
 # echo('connected successfully.');
} catch (PDOException $e ) {
  die('could not connect to database: '.$e->getMessage());
}