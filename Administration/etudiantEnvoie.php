<?php

    session_start();

    $con = mysqli_connect('localhost', 'root', 'root');

    mysqli_select_db($con, 'internat_ehtp');


    $nom = $_POST['nom'];
    $prénom = $_POST['prénom'];
    $cin = $_POST['cin'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $chambre = explode('-', $_POST['chambre']);
    $Pavillon = $chambre[0];
    $num = $chambre[1];


    $s = "select * from etudiants where CIN ='$cin'";
    $s2 = "select Id_chambre from chambres where Pavillon='$Pavillon' && num='$num'";

    $result = mysqli_query($con, $s);

    $result2 = mysqli_query($con, $s2);
    $row = $result2->fetch_assoc();

    $numero = mysqli_num_rows($result);

    $Id_Chambre = $row['Id_chambre'];

    if($numero == 1)
    {
        header("location:AjoutEtudiants.php?Invalid=Cet étudiant a déjà eu une chambre !");
    }
    else
    {
        $env = "insert into etudiants(nom, prenom, CIN, tel, email, Id_Chambre) values('$nom', '$prénom', '$cin' , '$tel', '$email', '$Id_Chambre')";

        $env2 = "update chambres set places_vide=places_vide-1 where Pavillon ='$Pavillon' && num = '$num'";

        mysqli_query($con, $env);
        mysqli_query($con, $env2);
        header("location:Etudiant_validé.php");

    }


?>
