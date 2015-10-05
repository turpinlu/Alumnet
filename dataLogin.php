<?php

    //address error handling
    ini_set('display_errors',1); //1 turns it on
    error_reporting(E_ALL & ~E_NOTICE); //errors_all, except notices (warnings)
    //Attempt to Connect
    if ($connection = @mysql_connect ('serv01.vm2824.sgvps.ent', 'alumnetx', 'Vu47Z7vis3')){
    }
    else {
        die('<p>Could not connect to MySQL because: <b>'.mysql_error().'</b></p>');
    }
    if (@mysql_select_db("alumnetx_ALUMNET", $connection)){
    }
    else {
        die('<p>Could not select the ALUMNET database because:
            <b>' .mysql_error().'</b></p>');
    }
?>