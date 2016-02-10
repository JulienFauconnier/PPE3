<?php
/**connexion base de donnees */
include_once('../model/config.php');
global $bdd;

/** @var request contient la requête SQL pour modifier un équipement */
$req = $bdd->prepare('UPDATE EQUIPEMENT SET cpu_equipement=:cpu_equipement, hdd_equipement=:hdd_equipement, soft_equipement=:soft_equipement,
        garantie_equipement=:garantie_equipement, fourn_equipement=:fourn_equipement, idVisiteur=:idVisiteur
        WHERE id_equipement = :id_equipement');
/** on exécute la requête en y spécifiant un array contenant les données */
$req->execute(array(
    ':cpu_equipement' => $_POST['cpu_equipement'],
    ':hdd_equipement' => $_POST['hdd_equipement'],
    ':soft_equipement' => $_POST['soft_equipement'],
    ':garantie_equipement' => $_POST['garantie_equipement'],
    ':fourn_equipement' => $_POST['fourn_equipement'],
    ':idVisiteur' => $_POST['idVisiteur'],
    ':id_equipement' => $_POST['id_equipement']
));

/** on retour aux équipements */
header('Location: ../index.php?page=equipements');
?>