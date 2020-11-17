<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";

function modifProspect($id) {
    $resultat = array();

    try {
        Prospect($id);
        


    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function modifvilleProspect($id)
{
    try{
        $cnx = connexionPDO();
        //Supprimer dans table prospect avec l'id_praticien
        $req = $cnx->prepare("DELETE FROM `prospect` WHERE `id_praticien` = $id");
        $req->execute();
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function deletePraticienProspect($id)
{
    try{
        $cnx = connexionPDO();
        //Supprimer dans table prospect avec l'id_praticien
        $req = $cnx->prepare("DELETE FROM `praticien` WHERE `id` = $id");
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
    //print_r(deleteProspect());
}
?>