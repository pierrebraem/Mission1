<h1>Ajouter des prospects</h1>
<form action="" method="post">
    <p>Nom :<input type="text"name="nom"></input></p>
    <p>Prenom :<input type="text" name="prenom"></input></p>
    <p>Adresse :<input type="text" name="adresse"></input></p>
    <p>
    Ville : 
    <select name="ville">
        <option value="">--Sélectionner une ville--</option>
        <?php foreach($listeVilles as $uneville) { ?>
            <option value=<?php echo $uneville['id']; ?>><?php echo $uneville['nom']; ?>, <?php echo $uneville['code_postal']; ?></option>
        <?php } ?>
    </select>
    </p>
    <p>
    Etat :
    <select name="etat">
        <option value="">--Sélectionner un état--</option>
        <?php foreach($listeEtats as $unetat){ ?>
            <option value=<?php echo $unetat['id']; ?>><?php echo $unetat['nom']; ?></option>
        <?php } ?>
    </select>
    </p>
    <input type="submit" name="Valider" value="Ajouter"></input>
</form>

<h1>Liste des prospects</h1>

<?php
$i = 0;
foreach ($listeProspects as $unprospect)
{
    $i++;
?>
    <div class="prospect">
        <h2 id="adresse">
            Prospect n° <?php echo $i ?>
        </h2>
    <p>
        <strong>Nom</strong> : <?php echo $unprospect['praticienNom']; ?><br />
        <strong>prenom</strong> : <?php echo $unprospect['prenom']; ?><br />
        <strong>adresse</strong> : <?php echo $unprospect['adresse']; ?><br />
        <strong>ville</strong> : <?php echo $unprospect['villeNom']; ?><br />
        <strong>Code Postal</strong> : <?php echo $unprospect['code_postal']; ?><br />
        <strong>Etat</strong> : <?php echo $unprospect['nomEtat']; ?><br />
        <button type="button">Modifier</button>
        <button type="button">Supprimer</button>
    </p>
    </div>
    

    <?php
}
?>


