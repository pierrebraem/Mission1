<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";

function getProspects() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select praticien.id as idPraticien, praticien.nom as praticienNom, prenom, adresse, ville.nom as villeNom , code_postal , etat.nom as nomEtat from prospect inner join praticien on prospect.id_Praticien = praticien.id inner join ville on praticien.id_Ville = ville.id inner join etat on etat.id = prospect.id_Etat");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getProspectsByIdR($idR) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from prospects where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
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