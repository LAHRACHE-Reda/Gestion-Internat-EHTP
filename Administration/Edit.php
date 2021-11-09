<!DOCTYPE html>
<html lang="fr">
	<head>
        <title>Modifier les informations</title>
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
            <h1 style="color:white; text-align:center; margin-top:50px;">Modifier les informations des étudiants</h1>
            <br>
            <div class="etudiant-form">
                <form id="etudiant-form" method="post" action="Edit.php">

										<label for="cin">CIN :</label><br><br>
                    <input name="cin" type="text" class="form-control" placeholder="CIN" required>
                    <br>
                    <br>
                    <input type="submit" class="form-control submit" value="Chercher">
                </form>
                <div>
                <?php
                    if($_POST)
                    {

                        $cin = $_POST['cin'];
                        $reponse = $bdd->query("select * from etudiants where CIN='$cin'");
                        $donnees = $reponse->fetch();
                        if($donnees)
                        {
													$reponse2 = $bdd->query("select * from etudiants INNER JOIN chambres on chambres.Id_chambre = etudiants.Id_Chambre where etudiants.CIN='$cin' ");
	                        $donnees2 = $reponse2->fetch();

                ?>
                        <h2>Les informations de l'étudiant :</h2><br>
                        <div id="result">
                        <h3><span class="title">Nom : </span><span class="result"><?php echo $donnees['nom']; ?></span></h3><br>
                        <h3><span class="title">Prénom : </span><span class="result"><?php echo $donnees['prenom']; ?></span></h3><br>
                        <h3><span class="title">CIN : </span><span class="result"><?php echo $donnees['CIN']; ?></span></h3><br>
                        <h3><span class="title">N° de téléphone : </span><span class="result"><?php echo $donnees['tel']; ?></span></h3><br>
                        <h3><span class="title">Email : </span><span class="result"><?php echo $donnees['email']; ?></span></h3><br>
                        <h3><span class="title">Chambre : </span><span class="result"><?php echo $donnees2['Pavillon'].$donnees2['num']; ?></span></h3>
                        </div><br><br>
                        <h2>Mise à jour :</h2>
                        <form id="etudiant-form" method="post" action="EditEnvoie.php?cin_primitif=<?php echo $cin; ?>&amp;Pav_prim=<?php echo $donnees2['Pavillon']; ?>&amp;num_prim=<?php echo $donnees2['num']; ?>">

                          <label for="nom">Nom :</label><br><br>
                          <input name="nom" type="text" class="form-control" placeholder="Le nom" required>
                          <br>
                          <br>
                          <label for="prénom">Prénom :</label><br><br>
                          <input name="prénom" type="text" class="form-control" placeholder="Le prénom" required>
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
                          <input type="submit" class="form-control submit" value="Modifier">
                        </form>
                <?php
                        }
                        else {
                ?>
                          <h2 style="color:#ADFF2F;"><i class="fas fa-exclamation-triangle"></i> Ce CIN n'existe pas dans la base des données</h2><br>
                <?php
                        }
                    }
                ?>
                </div>
            </div>

        </section>

    </body>



</html>
