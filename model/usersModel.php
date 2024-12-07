<?php
function Connexion(){
    $mysqli = new mysqli("localhost","root","","store");

if($mysqli->connect_error){
    die("error in connection".$mysqli->connect_error);
}
else{
    return $mysqli;
}
}
function InsertUser(){
    extract($_POST);
    $connexion = Connexion();
    $stmt =$connexion->prepare("INSERT INTO users (name,email,idFacture) values (?,?,?)");
    $stmt->bind_param("ssi",$username,$useremail,$idFacture);
    $stmt->execute();
}
function SelectUsers(){
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from users");
   
    
    return $result;
}