<!DOCTYPE html>
<html>
<head>
        <title>Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styleAccordion.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

    <?php
			include("sidebar.php")
    ?>

    <?php
        $bdd = new PDO('mysql:host=localhost;dbname=Internat_ehtp', 'root', 'root');
        session_start();
        $con = mysqli_connect('localhost', 'root', 'root');
        mysqli_select_db($con, 'internat_ehtp');

    ?>
        <section>
            <div class="animate__animated animate__zoomOutUp Bienvenu">Bienvenu</div>

            <button class="accordion">Les pavillons</button>
            <?php $reponse = $bdd->query("select distinct Pavillon from chambres"); ?>
            <div class="panel">
                <p>Les pavillons qui existent pour l'instant : <p>
                <ul>
                <?php
                    while($donnees = $reponse->fetch())
                    {
                ?>
                <li style="font-size: 20px; margin-left: 10%; font-weight: bold;text-transform: uppercase;"><?php echo "* ".$donnees['Pavillon']; ?></li>
                <?php
                    }
                ?>
                </ul>
            </div>

            <button class="accordion">Le nombre des chambres</button>
            <?php $reponse2 = $bdd->query("select distinct Pavillon from chambres"); ?>
            <div class="panel">
                <p>Le nombre des chambres qui existent dans chaque pavillon pour l'instant :<p>
                <ul>
                <?php
                    while($donnees2 = $reponse2->fetch())
                    {
                        $pav = $donnees2['Pavillon'];
                        $reponse3 = $bdd->query("select count(*) as total from chambres where Pavillon = '$pav'");
                        $donnees3 = $reponse3->fetch();
                ?>
                <li style="font-size: 18px; margin-left: 10%; font-weight: bold;text-transform: uppercase;"><?php echo "* ".$pav." : "?><br><span style="margin-left: 20px;text-transform: none;"><?php echo "--> ".$donnees3['total']." chambres"; ?></span></li>
                <?php
                    }
                ?>
                </ul>
            </div>

            <button class="accordion">Le nombre d'étudiants</button>
            <?php $reponse4 = $bdd->query("select count(*) as total2 from etudiants");
                $donnees4 = $reponse4->fetch();
            ?>
            <div class="panel">
                <p>Le nombre d'étudiants inscrit pour l'instant dans la base de données et qui ont une chambre :<p>
                <ul>
                <li style="font-size: 18px; margin-left: 10%; font-weight: bold;"><?php echo "* ".$donnees4['total2']." étudiants "?></li>
                </ul>
            </div>




        </section>





<script>
var acc = document.getElementsByClassName("accordion");
var i;

for(i=0;i<acc.length;i++)
{
    acc[i].addEventListener("click", function(){
        this.classList.toggle("active");

        var panel = this.nextElementSibling;
        if(panel.style.display === "block")
        {
            panel.style.display = "none";
        }
        else
        {
            panel.style.display = "block";
        }
    });
}
</script>

</body>
</html>
