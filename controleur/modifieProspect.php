<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.listeProspects.inc.php";
include_once "$racine/modele/bd.ville.inc.php";
include_once "$racine/modele/bd.etat.inc.php";

// recuperation des donnees GET, POST, et SESSION

//todo
if (!empty($_POST))
{
}
;
//todo test des valeurs dans poste puis modification dans modele.
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeProspects = getProspects();
$listeVilles = getVilles();
$listeEtats = getEtats();

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des prospects répertoriés";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueModifieProspect.php";
include "$racine/vue/pied.html.php";


?>