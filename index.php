<?php
require_once('controller/controller.php');
if(isset($_GET["action"])){
    $action = $_GET["action"];

    switch ($action) {
        case 'formulaire':
            viewForm();
            break;
        case  'addUserAction':
            addUserAction();
        case  'viewUsersList':
            viewUsersList();
        default:
            viewUsersList();    
            break;
    }
}
