<!DOCTYPE html>
<html lang="fr">
	<head>
        <title>L'état des chambres</title>
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
            <h1 style="color:white; text-align:center; margin-top:50px;">Verifier l'état d'une chambre</h1>
            <br>


            <div class="chambre-form">
                <form id="chambre-form" method="post" action="EtatChambre.php">

                    <label for="chambre">La chambre</label><br><br>
                    <select name="chambre" id="chambre" required>
                    <option disabled="disabled" selected="selected">---------------------- Choisir une chambre ----------------------</option>
                    <?php

                    $reponse = $bdd->query('SELECT distinct Pavillon FROM chambres');

                    while ($donnees = $reponse->fetch())
                    {
                    ?>
                                <optgroup name="Pavillon" label="<?php echo $donnees['Pavillon']; ?>">
                                <?php

                                $Pavillon = $donnees['Pavillon'];
                                $reponse2 = $bdd->query("SELECT num FROM chambres where Pavillon ='$Pavillon'");

                                while ($donnees2 = $reponse2->fetch())
                                {
                                ?>

                                <option name="num" value="<?php echo $donnees['Pavillon'].'-'.$donnees2['num']; ?>"><?php echo $donnees['Pavillon']; ?><?php echo $donnees2['num']; ?></option>
                                <?php
                                }
                                ?>
                                </optgroup>
                    <?php
                    }

                    ?>
                    </select><br><br>

                    <input type="submit" class="form-control submit" value="Verifier">

                </form>

                <div>
                <?php
                    if($_POST)
                    {


                        $con = mysqli_connect('localhost', 'root', 'root');

                        mysqli_select_db($con, 'internat_ehtp');
                        $chambre = explode('-', $_POST['chambre']);
                        $Pavillon = $chambre[0];
                        $num = $chambre[1];
                        $reponse3 = $bdd->query("select * from chambres where Pavillon ='$Pavillon' && num ='$num'");
                        $reponse4 = $bdd->query("select * from etudiants INNER JOIN chambres on chambres.Id_chambre = etudiants.Id_Chambre where Pavillon ='$Pavillon' && num ='$num'");
                        $donnees3 = $reponse3->fetch();


                ?>
                        <h3><span style="font-weight: bold;">Nombres de places vide dans la chambre <?php echo $_POST['chambre']." : ";?></span><span style="font-size: 25px;margin-left: 10px; color: #FFD700;"><?php echo $donnees3['places_vide']; ?></span></h3>
                        <?php
                            if($donnees3['places_vide']<2)
                            {
                        ?>
                                <br>
                                <h3 style="font-weight: bold;">Les étudiants qui ont cette chambre : </h3>

                            <ul>
                        <?php
                            while($donnees4 = $reponse4->fetch())
                                {
                        ?>
                        <br>
                        <li style="font-size: 25px; color: #FFD700; letter-spacing: 2px; text-transform: uppercase;"><?php echo $donnees4['nom']." ".$donnees4['prenom']; ?></li>
                        <?php
                                }
                        ?>
                            </ul>
                        <?php

                            }

                        ?>
                <?php
                    }
                ?>
                </div>

            </div>

        </section>

    </body>



</html>
