<?php
require 'connection.php';


//var_dump($_POST);
$name = $_POST['name'];
$lastname= $_POST['lastname'];
$year =$_POST['year'];
$num =$_POST['num'];
$nameErr = '';
$lastnameErr = '';
$yearErr = '';
$numErr = '';
if(empty($name)){
        $nameErr = "Obavezno unesite svoje ime"; 
};
if(empty($lastname)){
    $lastnameErr = "Obavezno unesite svoje prezime";
};
if ($year < 2003){
    $yearErr = "Uneli ste pogresnu godinu";
}
if ($num < 0){
    $numErr = "Uneli ste pogresni broj upisa";
}
if($nameErr !='' || $lastnameErr !='' || $yearErr !='' || $numErr !='' ){
    header("Location: home.php?nameErr=$nameErr&lastnameErr=$lastnameErr&yearErr=$yearErr&numErr=$numErr");
    exit();
}


$sqlPrepare = "INSERT INTO tasks 
    (name, lastname, year, num)
    VALUES( :name, :lastname, :year, :num)
    ";
$stmt = $pdo->prepare($sqlPrepare);
$stmt->execute([
    'name' => $name,
    'lastname' => $lastname,
    'year'=> $year,
    'num'=> $num
]); 


header("Location: http://127.0.0.1/projekat/home.php");