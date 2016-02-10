<?php
/**
 * Récupère l'ensemble des équipements
 * @return array contient l'ensemble des équipements
 */
function get_equipements()
{
    global $bdd;
    if ($_SESSION['nm_grp'] == 'Technicien') {
        $req = $bdd->prepare('SELECT *
            FROM EQUIPEMENT, MEMBRE
            WHERE idVisiteur=id');
        $req->execute();
    } else {
        $req = $bdd->prepare('SELECT *
            FROM EQUIPEMENT, MEMBRE
            WHERE idVisiteur=id
            AND idVisiteur=:id');
        $req->execute(array(
            ':id' => $_SESSION['id']));
    }
    $equipements = $req->fetchAll();

    return $equipements;
}

/**
 * Récupère un équipement
 * @param  integer $id_equipement contient l'identifiant de l'équipement à récupérer
 * @return array                  contient les données de l'équipement
 */
function get_equipement($id_equipement)
{
    global $bdd;
    $req = $bdd->prepare('SELECT *
        FROM EQUIPEMENT
        WHERE id_equipement = :id_equipement');
    $req->execute(array(
        ':id_equipement' => $id_equipement
    ));
    $equipement = $req->fetchAll();

    return $equipement;
}

// function add_equipement($equipement)
// {
//     global $bdd;

//     $req = $bdd->prepare('INSERT INTO EQUIPEMENT (cpu_equipement, hdd_equipement, soft_equipement, garantie_equipement, fourn_equipement, idVisiteur) 
//         VALUES (:cpu_equipement, :hdd_equipement, :soft_equipement, :garantie_equipement, :fourn_equipement, :idVisiteur)');
//     $req->execute(array(
//         ':cpu_equipement' => $_POST['cpu_equipement'],
//         ':hdd_equipement' => $_POST['hdd_equipement'],
//         ':soft_equipement' => $_POST['soft_equipement'],
//         ':garantie_equipement' => $_POST['garantie_equipement'],
//         ':fourn_equipement' => $_POST['fourn_equipement'],
//         ':idVisiteur' => $_POST['idVisiteur']
//         ));
// }

// function set_equipement($equipement)
// {
//     global $bdd;

//     $req = $bdd->prepare('UPDATE EQUIPEMENT SET cpu_equipement=:cpu_equipement, hdd_equipement=:hdd_equipement, soft_equipement=:soft_equipement,
//         garantie_equipement=:garantie_equipement, fourn_equipement=:fourn_equipement, idVisiteur=:idVisiteur WHERE id_equipement = :id_equipement');
//     $req->execute(array(
//         ':cpu_equipement' => $_POST['cpu_equipement'],
//         ':hdd_equipement' => $_POST['hdd_equipement'],
//         ':soft_equipement' => $_POST['soft_equipement'],
//         ':garantie_equipement' => $_POST['garantie_equipement'],
//         ':fourn_equipement' => $_POST['fourn_equipement'],
//         ':idVisiteur' => $_POST['idVisiteur'],
//         ':id_equipement' => $_POST['id_equipement']
//         ));
// }

/**
 * Supprimer un équipement
 * @param  integer $id_equipement contient l'identifiant de l'équipement à supprimer
 */
function dlt_equipement($id_equipement)
{
    global $bdd;
    $req = $bdd->prepare('DELETE FROM EQUIPEMENT
        WHERE id_equipement = :id_equipement');
    $req->execute(array(
        ':id_equipement' => $id_equipement
    ));
}

/**
 * Récupère la liste des membres
 * @return array contient la liste des membres
 */
function get_membres()
{
    global $bdd;
    $req = $bdd->prepare('SELECT id, nom, prenom
        FROM MEMBRE');
    $req->execute();
    $membres = $req->fetchAll();

    return $membres;
}