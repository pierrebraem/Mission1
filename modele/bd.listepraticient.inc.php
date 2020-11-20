<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";

function getPraticiens() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("
        SELECT praticien.id, praticien.nom nom, prenom, ville.nom ville_nom 
        FROM praticien
        INNER JOIN ville ON praticien.id_ville = ville.id
        ORDER BY praticien.id
        ");
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

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getPraticiens() : \n";
    print_r(getPraticiens());
}
?>


