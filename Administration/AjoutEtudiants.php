<!DOCTYPE html>
<html lang="fr">
	<head>
        <title>Ajouter un étudiant</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="style2.css" />
        <link rel="stylesheet" type="text/css" href="formstyle.css" />
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>

        <?php
			include("sidebar.php")
        ?>

        <?php
        {
            $bdd = new PDO('mysql:host=localhost;dbname=Internat_ehtp', 'root', 'root');
        }
        ?>

        <section>
            <br>
            <h1 style="color:white; text-align:center; margin-top:50px;">Ajouter un étudiant</h1>
            <br>

            <?php
            if(@$_GET['Invalid']==true)
            {
            ?>
            <div class="invalid"><i class="fas fa-exclamation-triangle"></i><?php echo " ".$_GET['Invalid'] ?> </div>
            <?php
                }
            ?>

            <div class="etudiant-form">
                <form id="etudiant-form" method="post" action="etudiantEnvoie.php">
                    <label for="nom">Nom :</label><br><br>
                    <input name="nom" type="text" class="form-control" placeholder="Le nom" required>
                    <br>
                    <br>
                    <label for="prénom">Prénom :</label><br><br>
                    <input name="prénom" type="text" class="form-control" placeholder="Le prénom" required>
                    <br>
                    <br>
										<label for="cin">CIN :</label><br><br>
                    <input name="cin" type="text" class="form-control" placeholder="CIN" required>
                    <br>
                    <br>
                    <label for="tel">Numéro de téléphone :</label><br><br>
                    <input name="tel" type="tel" size="13" minlength="10" maxlength="12" class="form-control" placeholder="0600000000">
                    <br>
                    <br>
                    <label for="email">Adresse email :</label><br><br>
                    <input name="email" type="email" class="form-control" placeholder="L'email">
                    <br>
                    <br>
                    <label for="chambre">La chambre</label><br><br>
                    <select name="chambre" id="chambre" required>
                    <option disabled="disabled" selected="selected">---------------------- Choisir une chambre ----------------------</option>
                    <?php

                    $reponse = $bdd->query('SELECT distinct Pavillon FROM chambres where places_vide>=1');

                    while ($donnees = $reponse->fetch())
                    {
                    ?>
                                <optgroup name="Pavillon" label="<?php echo $donnees['Pavillon']; ?>">
                                <?php

                                $Pavillon = $donnees['Pavillon'];
                                $reponse2 = $bdd->query("SELECT num FROM chambres where Pavillon ='$Pavillon' && places_vide>=1 ORDER BY num ASC");

                                while ($donnees2 = $reponse2->fetch())
                                {
                                ?>
																<?php if(isset($_GET['Pavillion']) && isset($_GET['num']) && $donnees['Pavillon']==$_GET['Pavillion'] && $donnees2['num']==$_GET['num'])
																{ ?>
                                <option selected="selected" name="num" value="<?php echo $donnees['Pavillon'].'-'.$donnees2['num']; ?>"><?php echo $donnees['Pavillon']; ?><?php echo $donnees2['num']; ?></option>
															  <?php
															  }
																else?>
																<option name="num" value="<?php echo $donnees['Pavillon'].'-'.$donnees2['num']; ?>"><?php echo $donnees['Pavillon']; ?><?php echo $donnees2['num']; ?></option>
                                <?php
                                }
                                ?>
                                </optgroup>
                    <?php
                    }

                    ?>
                    </select><br><br>




                    <input type="submit" class="form-control submit" value="Ajouter">
                </form>
            </div>

        </section>

    </body>



</html>
