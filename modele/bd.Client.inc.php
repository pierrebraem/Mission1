<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";

function getClients() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select client.id_praticien as idPraticien, praticien.nom as praticienNom, prenom, adresse, ville.nom as villeNom , code_postal from client inner join praticien on client.id_Praticien = praticien.id inner join ville on praticien.id_Ville = ville.id");
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

function getClientsByIdR($idR) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select client.id_praticien, praticien.nom, praticien.prenom, praticien.adresse from client INNER JOIN praticien ON client.id_praticien = praticien.id where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function AjouterClient($nom, $prenom, $adresse, $ville){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO praticien(nom, prenom, adresse, id_Ville) VALUES (:nom, :prenom, :adresse, :ville);");
        $req->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
        $req->bindParam(':prenom', $prenom, PDO::PARAM_STR, 25);
        $req->bindParam(':adresse', $adresse, PDO::PARAM_STR, 255);
        $req->bindValue(':ville', $ville, PDO::PARAM_INT);
        $req->execute();
        $idretour = $cnx->lastInsertId();
    }
    catch(PDOException $e){
        print "Erreur !: ". $e->getMessage();
        die();
    }
    return $idretour;
}

function AjouterClientTable($idPraticien){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO client(id_Praticien) VALUES (:idPraticien);");
        $req->bindValue(':idPraticien', $idPraticien, PDO::PARAM_INT);
        $req->execute();
        $valider = true;
    }
    catch(PDOException $e){
        print "Erreur !: ". $e.getMessage();
        die();
    }
    return $valider;
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