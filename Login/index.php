<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/sheet.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>
</head>

<body>

<?php
    include("C:\wamp64\www\Internat_EHTP\Nav_bar\Nav_bar.php")
?>



  <div class="main">
    <p class="sign" align="center">Administration Sign in</p>


    <?php
        if(@$_GET['Invalid']==true)
        {
      ?>
        <div class="alert-light text-danger text-center"><?php echo $_GET['Invalid'] ?> </div>
      <?php
        }
      ?>


    <form class="form1" action="validation.php" method="post">
      <input class="un " name="username" type="text" align="center" placeholder="Username">
      <input class="pass" name="password" type="password" align="center" placeholder="Password">
      <button class="submit" align="center">Sign in</button>



    </div>

    <?php
			include("C:\wamp64\www\Internat_EHTP\Nav_bar\Nav_bar_info.php")
	?>

<?php
    include("C:\wamp64\www\Internat_EHTP\common\Footer.php")
?>
