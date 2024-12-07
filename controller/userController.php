<?php
include("model/Storemodel.php");
function viewForm(){
    require_once('views/formview.php');
}
function addUserAction(){
    InsertUser();
    
}
function viewUsersList(){
    $result = SelectUsers();
    require_once('views/mainview.php');
}