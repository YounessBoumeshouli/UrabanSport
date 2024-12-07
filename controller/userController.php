<?php
include("model/usermodel.php");
function viewForm(){
    require_once('views/formview.php');
}
function addUserAction(){
    InsertUser();
    
}
function viewMain(){
    // $result = SelectUsers();
    require_once('views/mainview.php');
}
function viewUsersList(){
    // $result = SelectUsers();
    require_once('views/listusers.php');
}