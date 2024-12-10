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
    $connexion = Connexion();
    extract($_POST);
    $stmt1 = $connexion->prepare("SELECT * from users where nemro_telephone = ? or email = ?");
    $stmt1->execute([$NumeroTelephone,$email]);
    if($stmt1->affected_rows != 0){
        
    }else{
        $stmt =$connexion->prepare("INSERT INTO users (user_name,email,password_hash,nemro_telephone) values (?,?,?,?)");
        $stmt->bind_param("ssss",$full_name,$email,$NumeroTelephone,$password);
        $stmt->execute(); 
        $stmt2 = $connexion->prepare("SELECT * from users where username = ? and nemro_telephone = ? and  email = ? ");
        $stmt2->execute([$full_name,$NumeroTelephone,$email]); 
        return $stmt2;

    }
   
    
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
function SelectOneEquipement($id){
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from equipements where ID_Equipement = $id");
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
function addReservedEquipement($idEquipement,$idClient){
    $connexion = Connexion();
    $stmt = $connexion->prepare("INSERT INTO `reservations_equipements`( `ID_Membre`, `ID_Equipement`) 
    VALUES (?,?)");
    $stmt->execute([$idClient,$idEquipement]);
    if ($stmt->affected_rows > 0) {
        $stmt1  = $connexion->prepare("UPDATE `equipements` SET `Quantite`= `Quantite`-1 WHERE  `ID_Equipement` = ?");
        $stmt1->execute([$idEquipement]);
    } else {
        echo "No rows were inserted. Please check your data.";
    }
}
