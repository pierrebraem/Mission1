<h1>Modification des prospects</h1>


<?php
foreach ($listeProspects as $unprospect)
{ 
?>
    <!--<div class="prospect">
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
    </div>!-->

    <form $action="valider" method="post">

        <div>
            <label for="name">Nom :</label>
            <input type="nom" id="name" name="user_name" value="<?= $unprospect['praticienNom'];?>">
        </div>
        <div>
            <label for="prenom">Prenom :</label>
            <input type="prenom" id="name" name="user_prenom" value="<?= $unprospect['prenom']; ?>">
        </div>
        <div>
            <label for="adresse">Adresse :</label>
            <input type="adresse" id="name" name="user_adresse" value="<?= $unprospect['adresse']; ?>">
        </div>

        <div>
        <label for="ville">Ville :</label>
        <select name="ville" id="ville-select">
            <?php
                foreach ($listeVilles as $uneVille)
                { 
                    if($uneVille['nom'] === $unprospect['villeNom']):
                ?> 
                    <option value=<?php echo $uneVille['id']; ?> selected> <?php echo $uneVille['nom']; ?>, <?php echo $uneVille['code_postal'];?> </option>
                <?php
                    else:
                ?>
                    <option value=<?php echo $uneVille['id']; ?>> <?php echo $uneVille['nom']; ?>, <?php echo $uneVille['code_postal']; ?> </option>
                <?php
                    endif;
                }
                ?>
        </select>
        </div>
        <!--<?php var_dump($unprospect); ?>!-->
        <div>
        <label for="etat">Etat :</label>
        <select name="etat" id="etat-select">
            <?php
                foreach ($listeEtats as $unEtat)
                { 
                    $idetat = $unEtat['id'];
                    if($unEtat['nom'] === $unprospect['nomEtat']):
                ?>
                    <option value=<?php echo $unEtat['id']; ?> selected> <?php echo $unEtat['nom']; ?> </option>
                <?php
                    else:
                ?>
                    <option value=<?php echo $unEtat['id']; ?>> <?php echo $unEtat['nom']; ?> </option>
                <?php
                    endif;
                }
                ?>
        </select>
        </div>

        <div class="button">
            <button type="submit" name ="submit" value = <?php echo $unprospect['idPraticien'];?>> Valider</button>
        </div>
        </p>
    </form>
        <?php
    }
?>