<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";

function modifProspect($id,$nom,$prenom,$adresse) {
    $resultat = array();

    try {
        modifieProspectProspect($id,$nom,$prenom,$adresse);


    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function modifieProspectProspect($id,$nom,$prenom,$adresse)
{
    try{
        $cnx = connexionPDO();
        //Modifier avec l'id_praticien
        $req = $cnx->prepare("UPDATE `practicien` SET 'nom'= $nom, 'prenom' = $prenom, 'adresse' = $adresse WHERE `id_praticien` = $id");
        $req->execute();
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function modifiePraticienProspect($id)
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
    print_r(deleteProspect());
}
?>