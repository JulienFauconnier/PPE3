<?php
/** on vérifie si une variable de session existe */
if (!isset($_SESSION['id']))
    /** retour à l'index */
    header('Location: index.php');

/** sinon on récupère les données des tickets */
include_once('model/tickets.php');

/** on vérifie si des variables sont passés par l'url */
if (isset($_GET['a_recup'])) {
    /** @var array contient les données du ticket */
    $ticket = get_ticket($_GET['a_recup']);
    /** on vérifie si l'utilisateur a l'autorisation */
    if ($_SESSION['nm_grp'] != 'Techicien' && $ticket[0]['idVisiteur'] != $_SESSION['id'] &&
        $ticket[0]['etat_ticket'] != 'Ouvert' && $ticket[0]['etat_ticket'] != 'En Attente'
    )
        /** retour à l'index */
        header('Location: index.php?page=tickets');
}

/** @var array récupère tous les tickets */
$tickets = get_tickets();
/** @var array récupère tous les équipements */
$equipements = get_equipements();

/** on appel la view des tickets */
include_once('view/tickets.php');