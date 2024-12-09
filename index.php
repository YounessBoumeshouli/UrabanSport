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
            break;
        case  'viewMain':
            viewMain();
            break;
        case  'viewFormUser':
            viewFormUser();
            break;
        case  'viewUsersList':
            viewUsersList();
            break;
        case  'adminFormulaire':
            viewadminForm();
            break;
        case 'adminAuthentification':
            adminAuthentification();
            break;
        case 'userAuthentification':
            userAuthentification();
            break;
        case 'usermainview':
            usermainview();
            break;
        default:
        viewMain();    
            break;
    }
}else{
    viewMain();    
}

