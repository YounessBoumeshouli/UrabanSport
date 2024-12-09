<?php
include("model/usermodel.php");
function viewForm(){
    require_once('views/formview.php');
}
function addUserAction(){
    InsertUser();
    
}
function viewMain(){
   
    require_once('views/mainview.php');
}
function viewUsersList(){
    
    require_once('views/listusers.php');
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

        echo $row['username'];
        require_once('views/mainview.php');
     }
        
    }
    

function userAuthentification(){
    $result = Authuser();
    require_once('views/mainview.php');
}
function usermainview(){
    require_once('views/usermainview.php');
}