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
function selectActivites(){
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from activités");
    return $result;
}
function SelectOneActivity($id){
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from activités where id_activite = $id");
    return $result;
}
function addReservedActivity($idActivity,$idClient){
    $connexion = Connexion();
    $stmt = $connexion->prepare("INSERT INTO `reservations_activites`( `ID_Membre`, `ID_Activité`) 
    VALUES (?,?)");
    $stmt->execute([$idClient,$idActivity]);
    if ($stmt->affected_rows > 0) {
        $stmt1  = $connexion->prepare("UPDATE `activités` SET `Capacité`= `Capacité`-1 WHERE  `id_activite` = ?");
        $stmt1->execute([$idActivity]);
    } else {
        echo "No rows were inserted. Please check your data.";
    }
}