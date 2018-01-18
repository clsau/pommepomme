<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Fruit land an Agriculture Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Fruit land a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- default css files -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
	<link href="css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
	<link href="css/simpleLightbox.css" rel="stylesheet" type="text/css" /><!-- gallery css file -->
	<link rel="stylesheet" href="css/font-awesome.min.css" /><!-- Font awesome css file -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<!-- default css files -->
	
<!--web font-->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
<!--//web font-->

</head>

<!-- Body -->
<body>
<!-- header    MENU  -->
	<div style="background-color:#EFA86A;width:100%;"> 
			<h3 style="text-align:right;"> Contact </h3>
	</div>
	<div class="header-bottom" style="background-color: #A1D067;">
		<div class="container-fluid">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo" id="LeLogo">
					 <a href="index.html"><img src="logo1.png" alt="LOGO" /></a>
					</div>
				</div>
			
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li><a href="inscription.html">INSCRIPTION</a></li>
							<li><a href="identification.html" ">IDENTIFICATION</a></li>
							<li style="margin-top:15px;">  
							<?php //Connection avec la BDD.
								$mysqli = mysqli_connect("localhost", "root", "", "pommes");
								$request = mysqli_query($mysqli, "SELECT * FROM departement");?>
						<form method="POST" action="resultat_recherche.php">
						<select name="cboDept">
					<?php while($donnees = mysqli_fetch_array($request)){?>
					<option name="dpt" value="<?php echo $donnees['departement_code']; ?>"><?php echo $donnees['departement_nom']; ?></option>
				<?php }?>
					</select>
					<?php
					mysqli_close($mysqli); //deconnection de mysql
						?>
        				</li>
        				<li style="margin-top:15px;margin-left:10px;">  <input type='submit' name='recherche' value='Rechercher' align="center" ></li></form>
						</ul>
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
	<?php
		$id = $_GET['cboDept'];
		$mysqli = mysqli_connect("localhost", "root", "root", "Pomme") or die ('Impossible de se connecter');
		$Requete2 = mysqli_query($mysqli, "SELECT Titre, Id_CP, Nom, Prenom FROM user WHERE Id_CP=(select id_CP From code_postal where id_dpt='" . $id . "')");
		
	?>

<!--Fin du header -->

	<center>
	<table style="margin-top:200px;" border="1">
   <tr>
		
		<th>Titre</th>
		<th>Nom</th>
       <th>Prénom</th>
       <th>Code Postale</th>
       
		
   </tr> 
<?php while($donnees = mysqli_fetch_array($Requete2)) {   ?>
	<tr>
       <td><?php echo $donnees['Titre'];?></td>
	   <td><?php echo $donnees['Nom'];?></td>
	   <td><?php echo $donnees['Prenom'];?></td>
	   <td><?php echo $donnees['Id_CP'];?></td>
	</tr>
	<?php }?>
	<?
		mysqli_close($mysqli); //deconnection de mysql
	?>

</table>
</center>


<!-- footer -->
<div class="footer" style="margin-top:300px;">


	<div class="container" style="margin-top:100px;">
		<div class="col-md-6 footernav">
			<div class="agileits-social">
				<ul><a href="#home" class="scroll">ACCUEIL</a></ul>
				<ul><a href="#about" class="scroll">INSCRIPTION</a></ul>
				<ul><a href="#services" class="scroll">IDENTIFICATION</a></ul>
			</div>
		</div>
		<div class="col-md-6 footernav">
			<div class="agileits-social">
				<ul><a href="#home" class="scroll">MENTIONS LEGALES</a></ul>
			</div>
		</div>
		<div class="col-md-6 footernav">
			<div class="agileits-social">
				<ul><a href="#home" class="scroll">CONTACTS</a></ul>
			</div>
		</div>
	</div>
</div>
<!-- //footer -->
<!--//////////////////////////           FIN -->















<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Fruit land</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<div>
					<div class="modal-body">
						<img src="images/banana.png" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							e.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->

<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- //Default-JavaScript-File -->

<!-- Banner Slider js script file-->
<script src="js/JiSlider.js"></script>
<script>
			$(window).load(function () {
				$('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: false}).addClass('ff')
			})
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- //Banner Slider js script file-->

<!-- required-js-files-->
<link href="css/owl.carousel.css" rel="stylesheet">
	<script src="js/owl.carousel.js"></script>
		<script>
			$(document).ready(function() {
				$("#owl-demo").owlCarousel({
					items : 1,
					lazyLoad : true,
					autoPlay : true,
					navigation : false,
					navigationText :  false,
					pagination : true,
				});
			});
		 </script>
<!--//required-js-files-->

<!-- Light box js-file-->
	<script src="js/simpleLightbox.js"></script>
	<script>
		$('.w3layouts_gallery_grid a').simpleLightbox();
	</script>
<!-- //Light box js-file-->

<!-- clients js file-->
<script src="js/jquery.wmuSlider.js"></script> 
	<script>
		$('.example1').wmuSlider();         
	</script> 
<!-- //clients js file -->

<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->

<!-- Stars scrolling script -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<!-- //Ends scrolling script -->

</body>
<!-- //Body -->
</html>