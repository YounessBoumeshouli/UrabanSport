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