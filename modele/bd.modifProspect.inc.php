<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";

function modifProspect($id,$id_etat) {
    $resultat = array();

    try {
        modifprospectProspect($id,$id_etat);
        


    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function modifprospectProspect($id,$id_etat)
{
    try{
        $cnx = connexionPDO();
        //Supprimer dans table prospect avec l'id_praticien
        $req = $cnx->prepare("");
        $req->execute();
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getProspects() : \n";
    //print_r(modifProspect());
}
?>