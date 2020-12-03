<h1>Modification des prospects</h1>
<form action="modifie" method="POST">
<?php
foreach ($listeProspects as $unprospect)
{ 
?>
    <div class="prospect">
        <h2 id="adresse">
            Prospect
        </h2>
    <p>
        <strong>Nom</strong> : <input name ="nom"type="text" value="<?php echo $unprospect['praticienNom']; ?>"><br />
        <strong>Prénom</strong> : <input name ="prenom"type="text" value="<?php echo $unprospect['prenom']; ?>"><br />
        <strong>Adresse</strong> : <input name ="adresse"type="text" value="<?php echo $unprospect['adresse']; ?>"><br />
        <strong>Ville</strong> : <input type="text" value="<?php echo $unprospect['villeNom']; ?>"><br />
        <strong>Code Postal</strong> : <input type="text" value="<?php echo $unprospect['code_postal']; ?>"><br />
        <strong>Etat</strong> : <input type="text" value="<?php echo $unprospect['nomEtat']; ?>"><br />
        <div class="button">
        <button type="submit" name ="submit" value = <?php echo $unprospect['idPraticien'];?>> Modifier</button>
        </div>  
       
        </p>
    </div>
    

    <?php
}
?>
</form>


