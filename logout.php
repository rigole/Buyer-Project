<?php
session_start();
if((isset($_SESSION['name'])) || isset($_SESSION['access_token'])){

    unset($_SESSION['name']);
    unset($_SESSION['access_token']);

}

$_SESSION['flash']['success']="Vous êtes maintenant déconnectés. A bientôt";


header("Location: ../index.php");


