<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.Client.inc.php";
include_once "$racine/modele/bd.ville.inc.php";

// recuperation des donnees GET, POST, et SESSION
$nom = FILTER_INPUT(INPUT_POST, 'nom', FILTER_DEFAULT);
$prenom = FILTER_INPUT(INPUT_POST, 'prenom', FILTER_DEFAULT);
$adresse = FILTER_INPUT(INPUT_POST, 'adresse', FILTER_DEFAULT);
$ville = FILTER_INPUT(INPUT_POST, "ville", FILTER_DEFAULT);

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeClient = getClients();
$listeVilles = getVilles();
//Ajouter les clients quand on appuie sur le bouton
if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($ville)){
    $idretour = AjouterClient($nom, $prenom, $adresse, $ville);

    if(!empty($idretour)){
        AjouterClientTable($idretour);
    }

    //unset($nom);
    //unset($prenom);
    //unset($adresse);
    //unset($ville);
}

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des prospects répertoriés";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueClient.php";
include "$racine/vue/pied.html.php";