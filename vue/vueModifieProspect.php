<h1>Modification des prospects</h1>

<?php
foreach ($listeProspects as $unprospect)
{ 
?>
    <div class="prospect">
        <h2 id="adresse">
            Prospect
        </h2>
    <p>
        <strong>Nom</strong> : <?php echo $unprospect['praticienNom']; ?><br />
        <strong>prenom</strong> : <?php echo $unprospect['prenom']; ?><br />
        <strong>adresse</strong> : <?php echo $unprospect['adresse']; ?><br />
        <strong>ville</strong> : <?php echo $unprospect['villeNom']; ?><br />
        <strong>Code Postal</strong> : <?php echo $unprospect['code_postal']; ?><br />
        <strong>Etat</strong> : <?php echo $unprospect['nomEtat']; ?><br />
        </p>
    </div>
    

    <?php
}
?>


