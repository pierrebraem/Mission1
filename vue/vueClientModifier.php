<h1>Modifier client</h1>
<form $action="ModifierClient" method="post">
    <input type="hidden" name="id" value="<?php echo $informationclient['id_praticien']; ?>">
    <p>Nom :<input type="text" name="nom" value="<?php echo $informationclient['nom']; ?>"></input></p>
    <p>Prenom :<input type="text" name="prenom" value="<?php echo $informationclient['prenom']; ?>"></input></p>
    <p>Adresse :<input type="text" name="adresse" value="<?php echo $informationclient['adresse']; ?>"></input></p>
    <p>Ville :
    <select  name="ville">
        <option value="">--Sélectionner la ville--</option>
        <?php
            foreach($listeVilles as $uneVille)
            {
                if($uneVille['id'] == $informationclient['id_Ville']){
                    ?>
                    <option selected="selected" value=<?php echo $uneVille['id']; ?>><?php echo $uneVille['nom']; ?>, <?php echo $uneVille['code_postal']; ?></option>
                <?php
                }
                else{
            ?>
                <option value=<?php echo $uneVille['id']; ?>><?php echo $uneVille['nom']; ?>, <?php echo $uneVille['code_postal']; ?></option>
            <?php
                }
            }
            ?>
    </select>
    </p>
    <input type="submit" name="Modifier" value="Modifier"></input>
</form>