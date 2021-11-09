<!DOCTYPE html>
<html lang="fr">
	<head>
        <title>Ajouter une chambre</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="formstyle.css" />
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>

        <?php
			include("sidebar.php")
        ?>

        <section>
            <br>
            <h1 style="color:white; text-align:center; margin-top:50px;">Ajouter des chambres</h1>
            <br>
            <?php
                if(@$_GET['Invalid']==true)
                {
            ?>
            <div class="invalid"><i class="fas fa-exclamation-triangle"></i><?php echo " ".$_GET['Invalid'] ?> </div>
            <?php
                }
            ?>
            <div class="chambre-form">
                <form id="chambre-form" method="post" action="chambreEnvoie.php">
                    <label for="Pavillon">Pavillon :</label><br><br>
                    <input name="Pavillon" type="text" class="form-control" placeholder="Le pavillon" required>
                    <br>
                    <br>
                    <label for="num">N° de la chambre :</label><br><br>
                    <input name="numI" type="number" min="1" class="form-control" placeholder="A partir de" required><br><br>
										<input name="numF" type="number" min="1" class="form-control" placeholder="Jusqu'à" required>
                    <br>
                    <br>
                    <label for="places">Nombres d'étudants :</label><br><br>
                    <input name="places" type="number" min="1" class="form-control" placeholder="Nombres d'étudiants" required>
                    <br>
                    <br>
                    <input type="submit" class="form-control submit" value="Ajouter">
                </form>
            </div>

        </section>

    </body>



</html>
