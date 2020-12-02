<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.listeProspects.inc.php";
include_once "$racine/modele/bd.ville.inc.php";
include_once "$racine/modele/bd.etat.inc.php";

// recuperation des donnees GET, POST, et SESSION
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeProspects = getProspects();
$listeVilles = getVilles();
$listeEtats = getEtats();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des prospects répertoriés";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueListeProspect.php";
include "$racine/vue/pied.html.php";


?>