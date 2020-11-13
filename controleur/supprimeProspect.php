<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.listeProspects.inc.php";
include_once "$racine/modele/bd.deleteProspect.inc.php";

// recuperation des donnees GET, POST, et SESSION
if (!empty($_POST))
{
    $id = $_POST['submit'];
}
;
//on test si on a une valeur dans chaque champs
if(!empty($id) && isset($id))
{
    // appel des fonctions permettant de rajouter les donnees dans les bases de données.
    deleteProspect($id);
    echo "Id $id supprimé";
}
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeProspects = getProspects();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des prospects répertoriés";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueSupprimeProspect.php";
include "$racine/vue/pied.html.php";


?>