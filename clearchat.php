<?php
require_once('db.php');

$connection = new PDO('mysql:host='.host.';dbname='.database.';charset='.charset.';', user, password);

$query = "
DELETE FROM `task_1_easy`; 
DELETE FROM `task_1_medium`; 
DELETE FROM `task_2_easy`; 
DELETE FROM `task_2_medium`;
DELETE FROM `task_2_hard`";

    $connection->exec($query);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>