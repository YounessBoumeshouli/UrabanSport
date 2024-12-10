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
        case  'viewEquipements':
            viewEquipementList();
            break;
        case  'viewActivity':
            viewActivitesList();
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
        case 'ReserverEquipement':
            ReserverEquipement();
            break;
        case 'ReserverActivity':
            ReserverActivity();
            break;
        case 'ChooseActivity':
            ChooseActivity();
            break;
        case 'ChooseEquipement':
            ChooseEquipement();
            break;
        case 'Activityreserved':
            Activityreserved();
            break;
        case 'Equipementreserved':
            Equipementreserved();
            break;
        case 'LogoutClient':
            LogoutClient();
            break;
        case 'SignIn':
            SignIn();
            break;
        default:
        viewMain();    
            break;
    }
}

