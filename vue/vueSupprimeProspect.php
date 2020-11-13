<h1>Liste des prospect</h1>

<form $action="supprime" method="post">
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
    <div class="button">
        <button type="submit" name ="submit" value = <?php echo $unprospect['idPraticien'];?>> Supprimer</button>
    </div>
    
    </p>

    <?php
}
?>
</form>


