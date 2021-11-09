<?php

    session_start();

    $con = mysqli_connect('localhost', 'root', 'root');

    mysqli_select_db($con, 'internat_ehtp');


    $nom = $_POST['nom'];
    $prénom = $_POST['prénom'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $chambre = explode('-', $_POST['chambre']);
    $Pavillon = $chambre[0];
    $num = $chambre[1];
    $cin_primitif = $_GET['cin_primitif'];
    $pav_prim = $_GET['Pav_prim'];
    $num_prim = $_GET['num_prim'];


    $s = "select * from etudiants where CIN ='$cin_primitif'";
    $s2 = "select Id_chambre from chambres where Pavillon='$Pavillon' && num='$num'";
    $result2 = mysqli_query($con, $s2);
    $row = $result2->fetch_assoc();
    $Id_chambre = $row['Id_chambre'];

    $result = mysqli_query($con, $s);

    $numero = mysqli_num_rows($result);


    if($numero == 1)
    {
          $env = "update etudiants set nom='$nom', prenom='$prénom', tel='$tel', email='$email', Id_chambre='$Id_chambre' where CIN='$cin_primitif'";
          mysqli_query($con, $env);
          $env2 ="update chambres set places_vide=places_vide+1 where Pavillon='$pav_prim' and num='$num_prim' ";
          mysqli_query($con, $env2);
          $env3 ="update chambres set places_vide=places_vide-1 where Pavillon='$Pavillon' and num='$num' ";
          mysqli_query($con, $env3);
          header("location:Edit_validé.php");
    }



?>
