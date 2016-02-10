<?php
/** @var array on détruit la session */
$_SESSION = array();
session_destroy();

/** Suppression des cookies de connexion automatique */
setcookie('login', '');
setcookie('mdp', '');
setcookie('nm_grp', '');

/** retour à l'index */
header('Location: index.php');