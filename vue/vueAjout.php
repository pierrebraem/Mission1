<form $action="ajout" method="post">
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="user_name">
    </div>
    <div>
        <label for="prenom">prenom:</label>
        <input type="prenom" id="name" name="user_prenom">
    </div>
    <div>
        <label for="adresse">adresse:</label>
        <input type="adresse" id="name" name="user_adresse">
    </div>

    <div>
    <select name="ville" id="ville-select">
        <option value="">--Selectionner la ville--</option>
        <?php
            foreach ($listeVilles as $uneVille)
            { 
            ?>
                <option value=<?php echo $uneVille['id']; ?>><?php echo $uneVille['nom']; ?>, <?php echo $uneVille['code_postal']; ?></option>
            <?php
            }
            ?>
    </select>
    </div>

    <div>
    <select name="etat" id="etat-select">
        <option value="">--Selectionner un etat--</option>
        <?php
            foreach ($listeEtats as $unEtat)
            { 
                $idetat = $unEtat['id'];
            ?>
                <option value=<?php echo $unEtat['id']; ?>><?php echo $unEtat['nom']; ?></option>
            <?php
            }
            ?>
    </select>
    </div>




    <div class="button">
        <button type="submit">Ajouter</button>
    </div>
</form>
