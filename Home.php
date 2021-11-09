<?php 
	include("Common/Header.php")
?>
		<!--NAV bar-->

		<?php
			include("Nav_bar/Nav_bar.php")
		?>

		<!--END NAV bar-->


		<!-- Banner-->
		<SECTION>
			<div class="container-fluid">
				<div class="banner row" style="height: 100vh">
					<div class="col-lg-12 text-center">
						<h1 class="display-3 text-capitalize" style="color: #B22222;">Internat EHTP</h1>
						<h2 class="font-weight-light font-italic text-dark">Faciliter la gestion de l'internat et de ses ressources tout en optimisant le temps et les efforts</h2>
					</div>

					<!--Diapo-->

					<main>
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
 						   <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
 						   <div class="carousel-item active">
 						     <img src="images/1.jpg" class="d-block w-100" alt="...">
 						   </div>
 						   <div class="carousel-item">
 						     <img src="images/2.jpg" class="d-block w-100" alt="...">
 						   </div>
 						   <div class="carousel-item">
 						     <img src="images/3.jpg" class="d-block w-100" alt="...">
 						   </div>
 						 </div>
 						 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
 						   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
 						   <span class="sr-only">Previous</span>
 						 </a>
 						 <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
 						   <span class="carousel-control-next-icon" aria-hidden="true"></span>
 						   <span class="sr-only">Next</span>
 						 </a>
						</div>
					</main>

					<!--End Diapo-->

				</div>
			</div>
		</SECTION>

		<!-- End Banner-->


		<?php
			include("Nav_bar/Nav_bar_info.php")
		?>




<?php 
	include("Common/Footer.php")
?>
