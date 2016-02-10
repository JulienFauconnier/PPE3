<?php
/** on démarre la session */
session_start();

/** on check l'identifiant de la page, on l'initialise si il n'existe pas */
if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 'index';

/** connexion base de donnees */
include_once('model/config.php');

/** chargement de la page */
include_once('controller/' . $page . '.php');