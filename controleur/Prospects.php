<?php
    header( "content-type: text/html; charset=utf-8");

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }
    include_once "$racine/modele/bd.ville.inc.php";
    include_once "$racine/modele/bd.etat.inc.php";
    include_once "$racine/modele/bd.insertProspect.inc.php";

    $titre = "Gestion des praticiens répertoriés";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueProspect.php";
    include "$racine/vue/pied.html.php";
?>