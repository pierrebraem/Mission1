<?php
header('content-type: text/html; charset=uft-8');

if($_SERVER["SCRIPT_FILENAME"] == __FILE__){
    $racine="..";
}

include_once "$racine/modele/bd.Client.inc.php";
include_once "$racine/modele/bd.ville.inc.php";

$idR = FILTER_INPUT(INPUT_POST, 'id', FILTER_DEFAULT);
$listeClient = getClients();
$listeVilles = getVilles();

if(!empty($idR)){
    SupprimerClient($idR);
    SupprimerClientPraticien($idR);
}

$titre = "Liste des prospects répertoriés";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueClient.php";
include "$racine/vue/pied.html.php";