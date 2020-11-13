<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";

function insertProspect($nom,$prenom,$adresse,$ville,$etat) {
    $resultat = array();

    try {
        $idPraticien = InsertPraticien($nom,$prenom,$adresse,$ville,$etat);
        InsertTableProspect($idPraticien,$etat);


    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function InsertPraticien($nom,$prenom,$adresse,$idville)
{
    try{
        $cnx = connexionPDO();
        //insert dans la table praticien recuperation de l'id praticien en question
        $req = $cnx->prepare("INSERT INTO `praticien` (`id`, `nom`, `prenom`, `adresse`, `id_Ville`, `id_Type_Praticien`) VALUES (NULL,:nom,:prenom,:adresse,:id_Ville,1)");
        $req->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $req->bindParam(':prenom', $prenom, PDO::PARAM_STR, 25);
        $req->bindParam(':adresse', $adresse, PDO::PARAM_STR, 255);
        $req->bindValue(':id_Ville',$idville, PDO::PARAM_INT);
        $req->execute();
        $idRetour = $cnx->lastInsertId();
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $idRetour;
}

function getPraticienID($nom,$prenom,$addresse,$idville)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select id from praticien where nom=:nom and prenom=:prenom and adresse=:adresse and `id_Ville`=:id_Ville");
        $req->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $req->bindParam(':prenom', $prenom, PDO::PARAM_STR, 25);
        $req->bindParam(':adresse', $adresse, PDO::PARAM_STR, 255);
        $req->bindValue(':id_Ville',$idville, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function InsertTableProspect($idPraticien,$idetat)
{
    try {
        $cnx = connexionPDO();
        //insert dans la table praticien recuperation de l'id praticien en question
        $req = $cnx->prepare("INSERT INTO `prospect` (`id_Praticien`, `id_Etat`) VALUES (:id_Praticien,:id_Etat)");
        $req->bindValue(':id_Praticien', $idPraticien, PDO::PARAM_INT);
        $req->bindValue(':id_Etat', $idetat, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage();
    die();
    }
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getProspects() : \n";
    print_r(getProspects());

    echo "getProspectsByIdR(1) : \n";
    print_r(getProspectsByIdR(1));
}
?>