<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";


function modifProspect($id_praticien, $id_etat, $id_old_praticien)
{
    try{
        $cnx = connexionPDO();
        //Supprimer dans table prospect avec l'id_praticien
        $req = $cnx->prepare("
        UPDATE prospect
        SET id_Praticien = $id_praticien, id_Etat = $id_etat
        WHERE id_Praticien = $id_old_praticien
        ");
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