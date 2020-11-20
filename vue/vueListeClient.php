<h1>Liste des prospects</h1>

<?php
foreach ($listeClient as $unclient)
{ 
?>
    <div class="prospect">
        <h2 id="adresse">
            Client
        </h2>
    <p>
        <strong>Nom</strong> : <?php echo $unclient['praticienNom']; ?><br />
        <strong>prenom</strong> : <?php echo $unclient['prenom']; ?><br />
        <strong>adresse</strong> : <?php echo $unclient['adresse']; ?><br />
        <strong>ville</strong> : <?php echo $unclient['villeNom']; ?><br />
        <strong>Code Postal</strong> : <?php echo $unclient['code_postal']; ?><br />
        </p>
    </div>
    

    <?php
}
?>


