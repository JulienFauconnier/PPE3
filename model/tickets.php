<?php
/**
 * Récupère l'ensemble des tickets
 * @return array contient l'ensemble des tickets
 */
function get_tickets()
{
    global $bdd;
    if ($_SESSION['nm_grp'] == 'Technicien') {
        $req = $bdd->prepare('SELECT id_ticket, date_ticket, objet_ticket, complexite_ticket,
            description_ticket, solution_ticket, etat_ticket, dateint_ticket, T.nom, T.prenom 
            FROM TICKET
            LEFT JOIN MEMBRE AS T ON T.id=id_technicien');
        $req->execute();
    } else {
        $req = $bdd->prepare('SELECT id_ticket, date_ticket, objet_ticket, complexite_ticket,
            description_ticket, solution_ticket, etat_ticket, dateint_ticket, idVisiteur, T.nom, T.prenom 
            FROM TICKET
            LEFT JOIN EQUIPEMENT AS E ON E.id_equipement=idEquipement
            LEFT JOIN MEMBRE AS T ON T.id =id_technicien
            LEFT JOIN MEMBRE AS V ON V.id=:id
            WHERE idVisiteur=V.id;');
        $req->execute(array(
            ':id' => $_SESSION['id']));
    }
    $tickets = $req->fetchAll();

    return $tickets;
}

/**
 * Récupère un ticket
 * @param  integer $id_ticket contient l'identifiant du ticket à récupérer
 * @return array                  contient les données du ticket
 */
function get_ticket($id_ticket)
{
    global $bdd;
    $req = $bdd->prepare('SELECT id_ticket, date_ticket, objet_ticket, complexite_ticket,
        description_ticket, solution_ticket, etat_ticket, dateint_ticket, idEquipement, idVisiteur
        FROM TICKET, EQUIPEMENT
        WHERE idEquipement=id_equipement
        AND id_ticket = :id_ticket');
    $req->execute(array(
        ':id_ticket' => $id_ticket
    ));
    $ticket = $req->fetchAll();

    return $ticket;
}

/**
 * Récupère l'ensemble des équipements
 * @return array contient l'ensemble des équipements
 */
function get_equipements()
{
    global $bdd;
    if ($_SESSION['nm_grp'] == 'Technicien') {
        $req = $bdd->prepare('SELECT id_equipement, cpu_equipement, hdd_equipement, soft_equipement
            FROM EQUIPEMENT');
        $req->execute();
    } else {
        $req = $bdd->prepare('SELECT id_equipement, cpu_equipement, hdd_equipement, soft_equipement, idVisiteur
            FROM EQUIPEMENT
            WHERE idVisiteur=:id');
        $req->execute(array(
            ':id' => $_SESSION['id']));
    }
    $equipements = $req->fetchAll();

    return $equipements;
}