<?php

require_once('controller/usercontroller.php');
if(isset($_GET["action"])){
    $action = $_GET["action"];

    switch ($action) {
        case 'formulaire':
            viewForm();
            break;
        case  'addUserAction':
            addUserAction();
        case  'viewMain':
            viewMain();
        case  'viewUsersList':
            viewUsersList();
        default:
        viewMain();    
            break;
    }
}else{
    viewMain();    
}

