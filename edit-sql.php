<?php

require 'connection.php';	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$year = $_POST['year'];
	$num = $_POST['num'];
	

    $sql ="UPDATE tasks SET name= :name, lastname= :lastname, year= :year, num= :num WHERE idtasks= :id";
    $pdo->exec($sql);

	$stmt = $pdo->prepare($sql);

	$stmt->execute([
	'name'  => $name,
	'lastname' => $lastname,
	'year' => $year,
	'num' => $num,
	'id' => $id
	]);	
	

header('location: home.php');
?>