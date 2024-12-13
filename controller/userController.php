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
    $stats = Stats();
    require_once('views/mainview.php');
} 
function usermainview(){
   
    require_once('views/usermainview.php');
}
function viewUsersList(){
    $result = SelectUsers();
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
        viewMain();
     }
     require_once('views/formAdmin.php');   
    }
    

function userAuthentification(){
    $row = Authuser();
       if($row == false){
        viewFormUser();
       }
       else{
        
        require_once('views/usermainview.php');}
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
function ChooseEquipement(){
    $idEquipement = $_GET["id"];
    $result = SelectOneEquipement($idEquipement);
    require_once("views/ChooseEquipement.php");
}
function Activityreserved(){
    $idActivity = $_GET["idActivity"];
    $idClient = $_GET["idClient"];
    addReservedActivity($idActivity,$idClient);
    header('location:index.php?action=usermainview');
}
function Equipementreserved(){
    $idEquipement = $_GET["idEquipement"];
    $idClient = $_GET["idClient"];
    addReservedEquipement($idEquipement,$idClient);
    header('location:index.php?action=usermainview');
}
function  LogoutClient(){
    session_destroy();
    header("location:index.php?action=viewFormUser");
}
function  SignIn(){
  insertUser();
  
}
function  error_404(){
    require_once("views/pageNotFound.php");
}
function EditeUser(){
   $result =  selectUserById();
   require_once("views/updateuser.php");
}
function UpdateAction(){
    UpdateUserInfos();
    viewUsersList();
}
function DeleteUserAction(){
    DeleteUser();
    viewUsersList();

}
function MyReservation(){
    $result =  selectReservations();
   require_once("views/Myreservation.php");
}
function addActivity(){
    InsertActivity();
    viewActivitesList();
}