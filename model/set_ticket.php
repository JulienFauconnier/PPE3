<?php
/**connexion base de donnees */
include_once('../model/config.php');
global $bdd;

/** @var request contient la requête SQL pour modifier un ticket */
$req = $bdd->prepare('UPDATE TICKET SET objet_ticket=:objet_ticket, complexite_ticket=:complexite_ticket, description_ticket=:description_ticket,
        solution_ticket=:solution_ticket, etat_ticket=:etat_ticket, idEquipement=:idEquipement
        WHERE id_ticket = :id_ticket');
/** on exécute la requête en y spécifiant un array contenant les données */
$req->execute(array(
    ':objet_ticket' => $_POST['objet_ticket'],
    ':complexite_ticket' => $_POST['complexite_ticket'],
    ':description_ticket' => $_POST['description_ticket'],
    ':solution_ticket' => $_POST['solution_ticket'],
    ':etat_ticket' => $_POST['etat_ticket'],
    ':idEquipement' => $_POST['idEquipement'],
    ':id_ticket' => $_POST['id_ticket']
));

/** on retour aux tickets */
header('Location: ../index.php?page=tickets');
?>