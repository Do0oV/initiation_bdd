<?php
try{
$db = new PDO('mysql:host=localhost;dbname=initiation_bdd;charset=utf8', 'root', '');
}
catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>
