<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.listeProspects.inc.php";
include_once "$racine/modele/bd.ville.inc.php";
include_once "$racine/modele/bd.etat.inc.php";
include_once "$racine/modele/bd.modifProspect.inc.php";
include_once "$racine/modele/bd.listepraticient.inc.php";

// recuperation des donnees GET, POST, et SESSION
if (!empty($_POST))
{
    $id_praticien = $_POST['praticient'];
    $id_etat = $_POST['etat'];
    $id_old_praticien = $_POST['prospect'];
};
//todo
if(!empty($id_praticien) && isset($id_praticien))
{
    // appel des fonctions permettant de rajouter les donnees dans les bases de données.
    modifProspect($id_praticien, $id_etat, $id_old_praticien);
    echo "Prospect id=$id_old_praticien modifier avec praticien=$id_praticien et etat=$id_etat";
}
//todo test des valeurs dans poste puis modification dans modele.
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeProspects = getProspects();
$listeVilles = getVilles();
$listeEtats = getEtats();
$listePraticiens = getPraticiens();

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des prospects répertoriés";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueModifieProspect.php";
include "$racine/vue/pied.html.php";


?>