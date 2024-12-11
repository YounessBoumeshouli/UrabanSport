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
// num_rows for select and affected_rows for others
function InsertUser() {
    $connexion = Connexion();
    
    $NumeroTelephone = $_POST['NumeroTelephone'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $password = $_POST['password']; 

    $stmt1 = $connexion->prepare("SELECT * FROM users WHERE nemro_telephone = ? OR email = ?");
    $stmt1->bind_param("ss", $NumeroTelephone, $email); 
    $stmt1->execute();
    $result = $stmt1->get_result(); 

    if ($result->num_rows == 0) {
        $stmt = $connexion->prepare("INSERT INTO users (username, email, nemro_telephone, password_hash) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name, $email, $NumeroTelephone, $password); 
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
           
            header("Location: index.php?action=viewFormUser");
            exit(); 
        } else {
            echo "Failed to insert user. Please try again.";
        }

        $stmt->close(); 
    } else {
        echo "User already exists.";
    }

    $stmt1->close(); 
    $connexion->close(); 
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
    $quantite = $_POST["quantite"];
    $stmt = $connexion->prepare("INSERT INTO `reservations_equipements`( `ID_Membre`, `ID_Equipement`,`Quantite_Reservee`) 
    VALUES (?,?,?)");
    $stmt->execute([$idClient,$idEquipement,$quantite]);
    if ($stmt->affected_rows > 0) {
        $stmt1  = $connexion->prepare("UPDATE `equipements` SET `Quantite`= `Quantite`-? WHERE  `ID_Equipement` = ?");
        $stmt1->execute([$quantite,$idEquipement]);
    } else {
        echo "No rows were inserted. Please check your data.";
    }
}
