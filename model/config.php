<?php
/** connexion a la base de donnee */
try {
    /** @var PDO connexion à la bdd */
    $bdd = new PDO('mysql:host=localhost;dbname=gsb_frais', 'root', '');
} catch (Exception $e) {
    /** on renvoi une erreur de connexion */
    die('Erreur : ' . $e->getMessage());
}
