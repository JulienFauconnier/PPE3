<?php

/**
 * Ce fichier est inutilisé puisque la partie login est dans la barre de navigation
 * Il est conservé à des fins de tests pour d'éventuelles modifications
 */

// include_once('model/login.php');

if (!$resultat) {
    header('Location: ../index.php');
} else {
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['login'] = $resultat['login'];
    $_SESSION['nm_grp'] = $resultat['nm_grp'];
    header('Location: ../index.php');
}