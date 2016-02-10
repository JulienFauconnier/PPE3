<?php
/**connexion base de donnees */
include_once('../model/config.php');
global $bdd;

/** @var request contient la requête SQL pour ajouter un équipement */
$req = $bdd->prepare('INSERT INTO EQUIPEMENT (cpu_equipement, hdd_equipement, soft_equipement, garantie_equipement, fourn_equipement, idVisiteur)
        VALUES (:cpu_equipement, :hdd_equipement, :soft_equipement, :garantie_equipement, :fourn_equipement, :idVisiteur)');
/** on exécute la requête en y spécifiant un array contenant les données */
$req->execute(array(
    ':cpu_equipement' => $_POST['cpu_equipement'],
    ':hdd_equipement' => $_POST['hdd_equipement'],
    ':soft_equipement' => $_POST['soft_equipement'],
    ':garantie_equipement' => $_POST['garantie_equipement'],
    ':fourn_equipement' => $_POST['fourn_equipement'],
    ':idVisiteur' => $_POST['idVisiteur']
));

/** on retour aux équipements */
header('Location: ../index.php?page=equipements');
?>