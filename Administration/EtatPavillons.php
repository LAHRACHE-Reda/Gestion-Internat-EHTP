<!DOCTYPE html>
<html lang="fr">
	<head>
        <title>L'état des pavillions</title>
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
            <h1 style="color:white; text-align:center; margin-top:50px;">Verifier l'état d'un pavillion</h1>
            <br>


            <div class="pavillion-form">
                <form id="pavillion-form" method="post" action="EtatPavillons.php">

                    <label for="pavillion">Le pavillion</label><br><br>
                    <select name="pavillion" id="pavillion" required>
                    <option disabled="disabled" selected="selected">---------------------- Choisir un pavillion ----------------------</option>
                    <?php

                    $reponse = $bdd->query('SELECT distinct Pavillon FROM chambres');

                    while ($donnees = $reponse->fetch())
                    {
                    ?>
                        <option name="num" value="<?php echo $donnees['Pavillon']; ?>"><?php echo $donnees['Pavillon']; ?></option>
                    <?php
                    }
                    ?>
                    </select><br><br>

                    <input type="submit" class="form-control submit" value="Verifier">

                </form>

                <div">
                <?php
                    if($_POST)
                    {


                        $con = mysqli_connect('localhost', 'root', 'root');

                        mysqli_select_db($con, 'internat_ehtp');
                        $Pavillon = $_POST['pavillion'];
                        $reponse3 = $bdd->query("select count(*) as nbr from chambres where Pavillon ='$Pavillon'");
												$reponse4 = $bdd->query("select places_vide from chambres where Pavillon ='$Pavillon'");
                        $donnees3 = $reponse3->fetch();
                ?>
											<table>
												<caption><i class="far fa-building"></i> Pavillion <?php echo $Pavillon ?></caption>
												<?php
													$nbr = $donnees3['nbr'];
													$c = $nbr;
													while($nbr>0)
													{
												?>
														<tr>
															<?php
															$b = 13;
																while($b>0 and $nbr>0)
																{
																	$num = $c-$nbr + 1;
																	$reponse4 = $bdd->query("select * from chambres where Pavillon = '$Pavillon' and num = '$num'");
																	$donnees4 = $reponse4->fetch();
																	$places = $donnees4['places'];
																	$places_vide = $donnees4['places_vide'];
																	$occupee = $places - $places_vide;
																	if($places_vide==$places)
																	{
															?>
																	<td class="col1"><a href="http://localhost/Internat_EHTP/Administration/AjoutEtudiants.php?Pavillion=<?php echo $Pavillon ?>&amp;num=<?php echo $donnees4['num'] ?>"><button>N° <?php echo $donnees4['num']?><br><?php echo $occupee."/".$places; ?></button/a></td>
															<?php
																	}
																	else if($places_vide==0)
																	{
															?>
																	<td class="col3"><button>N° <?php echo $donnees4['num']?><br><?php echo $occupee."/".$places; ?></button></td>
															<?php
																	}
																	else
																	{
															?>
																	<td class="col2"><a href="http://localhost/Internat_EHTP/Administration/AjoutEtudiants.php?Pavillion=<?php echo $Pavillon ?>&amp;num=<?php echo $donnees4['num'] ?>"><button>N° <?php echo $donnees4['num']?><br><?php echo $occupee."/".$places; ?></button></a></td>
															<?php
																	}
																$nbr--;
																$b--;
																}
															?>
														</tr>

												<?php
													}
												?>
											</table>
                <?php
                    }
                ?>
                </div>

            </div>

        </section>

    </body>



</html>
