<?php
include("model/usermodel.php");
session_start();
function viewForm(){
    require_once('views/formview.php');
}
function addUserAction(){
    InsertUser();
    
}
function viewMain(){
   
    require_once('views/mainview.php');
}
function usermainview(){
   
    require_once('views/usermainview.php');
}
function viewUsersList(){
    
    require_once('views/listusers.php');
}
function viewEquipementList(){
    $result = selectEquipements();
    require_once('views/EquipementsList.php');
}
function viewActivitesList(){
    $result = selectActivites();
    require_once('views/ListActivities.php');
}
function viewadminForm(){
    require_once('views/formAdmin.php');
}
function viewFormUser(){
    require_once('views/formUser.php');
}
function adminAuthentification(){
    $result = Authadmin();
    while($row=$result->fetch_assoc()){
        $_SESSION["adminName"] = $row['username'];
        
        require_once('views/mainview.php');
     }
     require_once('views/formAdmin.php');
     
        
    }
    

function userAuthentification(){
    $result = Authuser();
        while($row=$result->fetch_assoc()){
        $_SESSION["UserName"] = $row["username"];
        $_SESSION["user_id"] = $row["user_id"];
        require_once('views/usermainview.php');
     }
}
function ReserverEquipement(){
    $result = selectEquipements();
    require_once("views/reserveEquipement.php");
}
function ReserverActivity(){
    $result = selectActivites();
    require_once("views/reserverActivity.php");
}
function ChooseActivity(){
    $idActivity = $_GET["id"];
    $result = SelectOneActivity($idActivity);
    require_once("views/ChooseActivity.php");
}
function Activityreserved(){
    $idActivity = $_GET["idActivity"];
    $idClient = $_GET["idClient"];
    addReservedActivity($idActivity,$idClient);
    header('location:index.php?action=usermainview');
}
