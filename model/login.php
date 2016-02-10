<?php
/** connexion base de donnees */
include_once('../model/config.php');
global $bdd;

/** @var request contient la requête pour se connecter */
$req = $bdd->prepare('SELECT id, login, nm_grp
	FROM MEMBRE M 
	LEFT JOIN GROUPE G ON (M.id_grp=G.id_grp)
	WHERE login = :login
	AND mdp = SHA1(:mdp)');
/** on exécute la requête en y spécifiant un array contenant les données */
$req->execute(array(
        'login' => $_POST['login'],
        'mdp' => $_POST['mdp']
    )
);
/** @var array contient les données de l'utilisateur authentifié */
$resultat = $req->fetch();

/** on vérifie si les informations sont valides */
if ($resultat) {
    /** initialisation de la session */
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['login'] = $resultat['login'];
    $_SESSION['nm_grp'] = $resultat['nm_grp'];
}

/** retour à l'index */
header('Location: ../index.php');