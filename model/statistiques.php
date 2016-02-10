<?php

/**
 * Récupère le délai moyen entre l'émission d'un ticket et l'intervention
 * @return double contient le délai moyen
 */
function get_delaiMoyen()
{
    global $bdd;
    $req = $bdd->prepare('SELECT AVG(DATEDIFF(dateint_ticket, date_ticket))
    	FROM TICKET
    	WHERE dateint_ticket IS NOT NULL');
    $req->execute();
    $delaiMoyen = $req->fetchAll();

    return $delaiMoyen;
}

/**
 * Récupère le nombre de tickets total
 * @return integer contient le nombre de tickets total
 */
function get_nbTickets()
{
    global $bdd;
    $req = $bdd->prepare('SELECT AVG(DATEDIFF(dateint_ticket, date_ticket))
    	FROM TICKET
    	WHERE dateint_ticket IS NOT NULL');
    $req->execute();
    $nbTickets = $req->fetchAll();

    return $nbTickets;
}

/**
 * Récupère le nombre de tickets fermés
 * @return integer contient le nombre de tickets fermés
 */
function get_nbResolus()
{
    global $bdd;
    $req = $bdd->prepare('SELECT AVG(DATEDIFF(dateint_ticket, date_ticket))
    	FROM TICKET
    	WHERE dateint_ticket IS NOT NULL');
    $req->execute();
    $nbResolus = $req->fetchAll();

    return $nbResolus;
}

/**
 * Récupère le nombre de tickets urgents
 * @return integer contient le nombre de tickets urgents
 */
function get_nbUrgents()
{
    global $bdd;
    $req = $bdd->prepare('SELECT AVG(DATEDIFF(dateint_ticket, date_ticket))
    	FROM TICKET
    	WHERE dateint_ticket IS NOT NULL');
    $req->execute();
    $nbUrgents = $req->fetchAll();

    return $nbUrgents;
}

/**
 * Récupère le nombre de tickets urgents fermés
 * @return integer contient le nombre de tickets urgents fermés
 */
function get_nbUrgentsResolus()
{
    global $bdd;
    $req = $bdd->prepare('SELECT AVG(DATEDIFF(dateint_ticket, date_ticket))
    	FROM TICKET
    	WHERE dateint_ticket IS NOT NULL');
    $req->execute();
    $nbUrgentsResolus = $req->fetchAll();

    return $nbUrgentsResolus;
}

/**
 * Récupère le nombre de tickets soumis chaque mois
 * @return double contient le nombre de tickets soumis chaque mois
 */
function get_nbVolumeMois()
{
    global $bdd;
    $req = $bdd->prepare('SELECT AVG(DATEDIFF(dateint_ticket, date_ticket))
    	FROM TICKET
    	WHERE dateint_ticket IS NOT NULL');
    $req->execute();
    $volumeMois = $req->fetchAll();

    return $volumeMois;
}