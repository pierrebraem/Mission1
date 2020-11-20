<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.ville.inc.php";
include_once "$racine/modele/bd.etat.inc.php";
include_once "$racine/modele/bd.insertProspect.inc.php";

// recuperation des donnees GET, POST, et SESSION
if (!empty($_POST))
{
    $nom = $_POST['user_name'];
    $prenom = $_POST['user_prenom'];
    $adresse = $_POST['user_adresse'];
    $ville = $_POST['ville'];
    $etat = $_POST['etat'];
}
;
//on test si on a une valeur dans chaque champs
if(!empty($nom) && isset($nom) && !empty($prenom) && isset($prenom) && !empty($adresse) && isset($adresse))
{
    // appel des fonctions permettant de rajouter les donnees dans les bases de données.
    insertProspect($nom,$prenom,$adresse,$ville,$etat);
    echo "table importées";
}
$listeVilles = getVilles();
$listeEtats = getEtats();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Gestion des praticiens répertoriés";
include "$racine/vue/entete.html.php";
//include "$racine/vue/vueAjout.php";
include "$racine/vue/vueListeProspect.php";
include "$racine/vue/pied.html.php";


?>