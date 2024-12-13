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
// num_rows pour select et affected_rows pour others
function InsertUser() {
    $connexion = Connexion();
    
    $NumeroTelephone = $_POST['NumeroTelephone'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $password = $_POST['password']; 
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    $stmt1 = $connexion->prepare("SELECT * FROM users WHERE nemro_telephone = ? OR email = ?");
    $stmt1->bind_param("ss", $NumeroTelephone, $email); 
    $stmt1->execute();
    $result = $stmt1->get_result(); 

    if ($result->num_rows == 0) {
        $stmt = $connexion->prepare("INSERT INTO users (username, email, nemro_telephone, password_hash) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name, $email, $NumeroTelephone, $hashed_password); 
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
    $result = $connexion->query("SELECT 
    users.*, 
    COUNT(DISTINCT reservations_equipements.ID_Reservation) AS numberTrEquipement, 
    COUNT(DISTINCT reservations_activites.ID_Reservation) AS numberTrActivity
FROM 
    users
LEFT JOIN reservations_equipements ON users.user_id = reservations_equipements.ID_Membre
LEFT JOIN reservations_activites ON users.user_id = reservations_activites.ID_Membre
WHERE 
    users.role = 'user'
GROUP BY 
    users.user_id;");
   
    
    return $result;
}
function Authadmin(){
    $password = $_POST["password"];
    $nom = $_POST["nom"];
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from users where username = '$nom' and password_hash = '$password' and role='admin'");
    return $result;
}
function Authuser() {
    $password = $_POST["password"];
    $nom = $_POST["nom"];

    $connexion = Connexion();

    $stmt = $connexion->prepare("SELECT * FROM users WHERE username = ? AND role = 'user'");
    $stmt->bind_param("s", $nom);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        
        if (password_verify($password, $data["password_hash"])) {
            $_SESSION["UserName"] = $data["username"];
        $_SESSION["user_id"] = $data["user_id"];
            return $data;
        } else {
            return false; 
        }
    } else {
        return false; 
    }
    
    $stmt->close();
}

function selectEquipements(){
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from equipements where Disponibilite = 1");
    return $result;
}
function selectActivites(){
    $connexion = Connexion();
    $result = $connexion->query("SELECT * from activités where Disponibilité = 1");
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
    $capacite = $_POST["capacite"];
    $prix = $_POST["prix"];
    $total = $prix * $capacite;
    $stmt = $connexion->prepare("INSERT INTO `reservations_activites`( `ID_Membre`, `ID_Activité`,`Prix_Reservation`,`Places_Reserver`) 
    VALUES (?,?,?,?)");
    $stmt->execute([$idClient,$idActivity,$total,$capacite]);
    if ($stmt->affected_rows > 0) {
        $stmt1  = $connexion->prepare("UPDATE `activités` SET `Capacité`= `Capacité`-? WHERE  `id_activite` = ?");
        $stmt1->execute([$capacite,$idActivity]);
        if ($stmt1->affected_rows > 0) {
            $stmt2 = $connexion->prepare("UPDATE `activités` SET Disponibilité = ? where `Capacité` = ?");
            $stmt2->execute([0,0]);
        }
    } else {
        echo "No rows were inserted. Please check your data.";
    }
}
function addReservedEquipement($idEquipement,$idClient){
    $connexion = Connexion();
    $quantite = $_POST["quantite"];
    $prix = $_POST["prix"];
    $ResPrix = $quantite * $prix;
    $stmt = $connexion->prepare("INSERT INTO `reservations_equipements`( `ID_Membre`, `ID_Equipement`,`Quantite_Reservee`,`Prix`) 
    VALUES (?,?,?,?)");
    $stmt->execute([$idClient,$idEquipement,$quantite,$ResPrix]);
    if ($stmt->affected_rows > 0) {
        $stmt1  = $connexion->prepare("UPDATE `equipements` SET `Quantite`= `Quantite`-? WHERE  `ID_Equipement` = ?");
        $stmt1->execute([$quantite,$idEquipement]);
        if ($stmt1->affected_rows > 0) {
            $stmt2 = $connexion->prepare("UPDATE `equipements` SET Disponibilite = ? where `Quantite` = ?");
            $stmt2->execute([0,0]);
        }
    } else {
        echo "No rows were inserted. Please check your data.";
    }
}
function selectUserById(){
    $connexion = Connexion();
    $id = $_GET["id"];
    $stmt = $connexion->prepare("select * from users where user_id = ?");
    $stmt->execute([$id]);
    $result = $stmt->get_result();
    return $result;
}
function  UpdateUserInfos(){
    $connexion = Connexion();
    $user_name = $_POST["full_name"];
    $id = $_POST["user_id"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $NumeroTelephone = $_POST["NumeroTelephone"];
    $password = $_POST["password"];
    $stmt = $connexion->prepare("UPDATE `users` SET `username`=?,`password_hash`=?,`email`=?,`nemro_telephone`=? WHERE `user_id`=?");
    $stmt->execute([$user_name,$password,$email,$NumeroTelephone,$id]);
    $result = $stmt->get_result();
    return $result;
}
function DeleteUser(){
    $connexion = Connexion();
    $id = $_GET["id"];
    $stmt = $connexion->prepare("Delete from `users`  WHERE `user_id`=?");
    $stmt->execute([$id]);
}
function Stats() {
        $connexion = Connexion();

    $result = $connexion->query("SELECT (SELECT COUNT(user_id) FROM users) AS Total_Users,
            (SELECT SUM(Prix_Reservation) FROM reservations_activites) AS Total_RevenueActivity,
            (SELECT SUM(Prix) FROM reservations_equipements) AS Total_RevenueEquipement,
            (SELECT COUNT(id_activite) FROM activités) AS Total_Activities,
            (SELECT COUNT(ID_Reservation) FROM reservations_equipements) AS Total_ReservationActivity,
            (SELECT COUNT(ID_Reservation) FROM reservations_activites) AS Total_ReservationEquipement,
            (SELECT COUNT(ID_Equipement) FROM equipements) AS Total_Equipements");
            $stats = $result->fetch_assoc();
    return $stats;
  
}
function selectReservations(){
    $connexion = Connexion();
    $id = $_SESSION['id'];
    $result = $connexion->query("SELECT reservations_equipements.ID_Reservation, reservations_equipements.ID_Membre, reservations_equipements.Quantite_Reservee AS Detail,
     equipements.Description AS description, equipements.Nom_Equipement AS Nom, reservations_equipements.ID_Equipement AS Resource,
      'reservations_equipements' AS Source
     FROM `reservations_equipements` INNER join equipements
      ON equipements.ID_Equipement = reservations_equipements.ID_Equipement WHERE ID_Membre = $id 
      UNION ALL 
      SELECT reservations_activites.ID_Reservation, reservations_activites.ID_Membre, reservations_activites.Places_Reserver AS Detail,
       activités.description AS description, activités.activite_name AS Nom, reservations_activites.ID_Activité AS Resource,
        'reservations_activites' AS Source 
        FROM `reservations_activites` 
        INNER join activités ON activités.id_activite = reservations_activites.ID_Activité 
        WHERE ID_Membre = $id ORDER BY Source;");

return $result;


}