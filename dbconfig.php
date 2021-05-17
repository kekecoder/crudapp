<?php

$server = 'remotemysql.com';
$dbname = '6V3DUWFCoy';
$user = '6V3DUWFCoy';
$pass = 'G4ZOUl2GLh';

try {
  $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
 # echo('connected successfully.');
} catch (PDOException $e ) {
  die('could not connect to database: '.$e->getMessage());
}