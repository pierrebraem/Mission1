<?php
header('content-type: text/html; charset=utf-8');

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.Client.inc.php";
include_once "$racine/modele/bd.ville.inc.php";

$idR = FILTER_INPUT(INPUT_POST, 'id', FILTER_DEFAULT);
$nom = FILTER_INPUT(INPUT_POST, 'nom', FILTER_DEFAULT);
$prenom = FILTER_INPUT(INPUT_POST, 'prenom', FILTER_DEFAULT);
$adresse = FILTER_INPUT(INPUT_POST, 'adresse', FILTER_DEFAULT);
$ville = FILTER_INPUT(INPUT_POST, 'ville', FILTER_DEFAULT);

if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($ville)){
    ModifierClient($nom, $prenom, $adresse, $ville, $idR);
}

$listeVilles = getVilles();
$informationclient = getClientsByIdR($idR);
//var_dump($informationclient);



$titre = "Modification d'un client";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueClientModifier.php";
include "$racine/vue/pied.html.php";

?>