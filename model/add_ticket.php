<?php
/**connexion base de donnees */
include_once('../model/config.php');
global $bdd;

/** @var request contient la requête SQL pour ajouter un ticket */
$req = $bdd->prepare('INSERT INTO TICKET (objet_ticket, complexite_ticket, description_ticket, solution_ticket, etat_ticket, idEquipement)
        VALUES (:objet_ticket, :complexite_ticket, :description_ticket, :solution_ticket, :etat_ticket,:idEquipement)');
/** on exécute la requête en y spécifiant un array contenant les données */
$req->execute(array(
    ':objet_ticket' => $_POST['objet_ticket'],
    ':complexite_ticket' => $_POST['complexite_ticket'],
    ':description_ticket' => $_POST['description_ticket'],
    ':solution_ticket' => $_POST['solution_ticket'],
    ':etat_ticket' => "Ouvert",
    ':idEquipement' => $_POST['idEquipement']
));

/** on retour aux tickets */
header('Location: ../index.php?page=tickets');
?>