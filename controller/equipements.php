<?php
/** on vérifie si une variable de session existe */
if (!isset($_SESSION['id']))
    /** retour à l'index */
    header('Location: index.php');

/** sinon on récupère les données des équipements */
include_once('model/equipements.php');

/** on vérifie si des variables sont passés par l'url */
if (isset($_GET['a_recup'])) {
    /** @var array contient les données de l'équipement */
    $equipement = get_equipement($_GET['a_recup']);
    /** on vérifie si l'utilisateur est un technicien */
    if ($_SESSION['nm_grp'] != 'Technicien')
        /** retour à l'index */
        header('Location: index.php?page=equipements');
}

/** on vérifie si demande de suppression */
if (!empty($_GET['a_supp'])) {
    /** on vérifie si l'utilisateur est un technicien */
    if ($_SESSION['nm_grp'] == 'Technicien')
        /** on appel la fonction pour supprimer l'équipement */
        dlt_equipement($_GET['a_supp']);
    /** on retourne à la liste des équipements */
    header('Location: index.php?page=equipements');
}

/** @var array récupère tous les équipements */
$equipements = get_equipements();
/** @var array recupère tous les membres */
$membres = get_membres();

/** on appel la view des équipements */
include_once('view/equipements.php');