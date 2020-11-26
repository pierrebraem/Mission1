<h1>Modification des prospects</h1>


<?php
foreach ($listeProspects as $unprospect)
{ 
?>


    <form $action="modif" method="post">
    <?php //echo var_dump($unprospect['idPraticien']); ?> <!-- !-->
    <input name="prospect" id="prospect" type="hidden" value="<?php echo $unprospect['idPraticien'] ?>">
    <div>
        <label for="praticient">Praticient :</label>
        <select name="praticient" id="praticient-select">
            <?php
                foreach ($listePraticiens as $unPraticien)
                { 
                    if($unPraticien['id'] === $unprospect['idPraticien']):
                ?> 
                    <option value=<?php echo $unPraticien['id']; ?> selected> <?php echo $unPraticien['nom']; ?>, <?php echo $unPraticien['prenom']; ?>, <?php echo $unPraticien['ville_nom'];?> </option>
                <?php
                    else:
                ?>
                    <option value=<?php echo $unPraticien['id']; ?>> <?php echo $unPraticien['nom']; ?>, <?php echo $unPraticien['prenom']; ?>, <?php echo $unPraticien['ville_nom'];?> </option>
                <?php
                    endif;
                }
                ?>
        </select>
        </div>

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
            <button type="submit" name ="submit"> Valider</button>
        </div>
        </p>
    </form>
        <?php
    }
?>