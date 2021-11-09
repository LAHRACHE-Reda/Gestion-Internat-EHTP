<?php

    session_start();

    $con = mysqli_connect('localhost', 'root', 'root');

    mysqli_select_db($con, 'Internat_ehtp');

    $Pavillon = $_POST['Pavillon'];
    $numI = $_POST['numI'];
    $numF = $_POST['numF'];
    $places = $_POST['places'];
    $places_vide = $_POST['places'];

    for($i=$numI;$i<=$numF;$i++)
    {
        $s = "select * from chambres where Pavillon ='$Pavillon' && num ='$i'";

        $result = mysqli_query($con, $s);

        $numero = mysqli_num_rows($result);

        if($numero == 1)
        {
            header("location:AjoutChambres.php?Invalid=La chambre n° $i est déjà ajoutée !");
        }
        else
        {
            $env = "insert into chambres(Pavillon, num, places, places_vide) values('$Pavillon', '$i', '$places', '$places')";
            mysqli_query($con, $env);
            header("location:Chambre_validé.php");
        }
    }


?>
