<?php
function Connexion(){
    $mysqli = new mysqli("localhost","root","","urbansport");

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
function Authadmin(){
    
   
    $password = $_POST["password"];
    $nom = $_POST["nom"];
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from users where username = '$nom' and password_hash = '$password' and role='admin'");
    return $result;
}
function Authuser(){
    
   
    $password = $_POST["password"];
    $nom = $_POST["nom"];
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from users where username = '$nom' and password_hash = '$password' and role='user'");
    return $result;
}
function selectEquipements(){
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from equipements");
    return $result;
}