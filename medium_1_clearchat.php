<?php
require_once('db.php');

$connection = new PDO('mysql:host='.host.';dbname='.database.';charset='.charset.';', user, password);

$query = 'DELETE FROM `messages` WHERE id>0;';

$connection->exec($query);
header('Location: medium_1.php');
exit;
?>