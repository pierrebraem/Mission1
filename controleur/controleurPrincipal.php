<?php
header( 'content-type: text/html; charset=utf-8' );

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["liste"] = "listeProspects.php";
    $lesActions["detail"] = "detailProspect.php";
    $lesActions["ajout"] = "ajoutProspect.php";
    $lesActions["modifie"] = "modifieProspect.php";
    $lesActions["supprime"] = "supprimeProspect.php";
    $lesActions["listeclient"] = "listeClient.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>