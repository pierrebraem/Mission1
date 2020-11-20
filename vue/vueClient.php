<h1>Ajouter client</h1>
<form action="" method="post">
    <p>Nom :<input type="text" name="nom"></input></p>
    <p>Prenom :<input type="text" name="prenom"></input></p>
    <p>Adresse :<input type="text" name="Adresse"></input></p>
    <p>Ville :
    <select  name="ville">
        <option value="">--Sélectionner la ville--</option>
        <?php
            foreach($listeVilles as $uneVille)
            {
            ?>
                <option value=<?php echo $uneVille['id']; ?>><?php echo $uneVille['nom']; ?>, <?php echo $uneVille['code_postal']; ?></option>
            <?php
            }
            ?>
    </select>
    </p>
    <input type="submit" name="Valider" value="Ajouter"></input>
</form>
<h1>Liste des clients</h1>

<?php
$i = 0;
foreach ($listeClient as $unclient)
{
    $i++; 
?>
    <div class="prospect">
        <h2 id="adresse">
            Client n° <?php echo $i ?> 
        </h2>
    <p>
        <strong>Nom</strong> : <?php echo $unclient['praticienNom']; ?><br />
        <strong>prenom</strong> : <?php echo $unclient['prenom']; ?><br />
        <strong>adresse</strong> : <?php echo $unclient['adresse']; ?><br />
        <strong>ville</strong> : <?php echo $unclient['villeNom']; ?><br />
        <strong>Code Postal</strong> : <?php echo $unclient['code_postal']; ?><br />
        <button type="button" class="btn btn-outline-success">Modifier</button>
        <button type="button">Supprimer</button>
    </p>
    </div>
    

    <?php
}
?>


