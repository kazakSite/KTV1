<?php
session_start();
include ('connexion.php');
include ('function.php');
   
    $connect = mysql_connect($host,$user,$pwd);
    $connectdb = mysql_select_db($bdd);
	$_SESSION['connexion']="1";
	mysql_query("SET NAMES UTF8"); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="img/icone.ico" />


    <title>DEV</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
	
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
  $(function() {
    if ($.browser.msie && $.browser.version.substr(0,1)<7)
    {
      $('.tooltip').mouseover(function(){
            $(this).children('span').show();
          }).mouseout(function(){
            $(this).children('span').hide();
          });
    }
  });
</script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
                    <h1>#Euro Collectors</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Home</a></li>
		<li><a href="#reunion">Reunion</a></li>
		<li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#follow">Stat 1</a></li>
            <li><a href="#update">Stat 2</a></li>
			<li><a href="#double">Stat 3</a></li>
          </ul>
        </li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2><span class="text_color">Euro Collectors</span> </h2>
			<h4>   </h4><br>
			
		</div>
		<div class="page-scroll">
			<a href="#reunion" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
<!-- /Section: intro -->

	
<!-- Section: map -->   
	
   <section id="reunion" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Reunions</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		
<?php

$dateJ = date("Y-m-d");


$dateD =  time() + 86400; // ajout de 24 heures
$dateD = date("Y-m-d", $dateD);
//$datD = '2015-10-23';


//echo $dateJ;

$sqlReunion="select distinct lieu from kazak_reunion where dateReunion='$dateJ'";
//echo $sqlReunion;
$resReunion = mysql_query($sqlReunion) or exit('Erreur SQL ligne '.__LINE__.' : '.mysql_error());

$sqlReunionD="select distinct lieu from kazak_reunion where dateReunion='$dateD'";
//echo $sqlReunion;
$resReunionD = mysql_query($sqlReunionD) or exit('Erreur SQL ligne '.__LINE__.' : '.mysql_error());



?>

		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-lg-offset-5">
					<hr class="marginbot-50">
				</div>
		</div>
        <div class="row">
		<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h4>Reunions du jour</h4>
						<form method="post" action="index.php#courses">
							
							<?php	echo '<input type="hidden" name="test2" type="text" id="Name" value="'.$dateJ.'"/>';?>
							
							<?php   echo "<select name='lieu'>";
									while ($dataReunion = mysql_fetch_array($resReunion)){
										echo	"<option>".$lieu = $dataReunion['lieu']."</option>";;	
									}
							echo"</select>"; ?>
							<label><input type="submit" name="Bouton" id="Bouton" value="Envoyer" /></label>
						</form>
					</div>
					<div class="section-heading">
					<P>
					<h4>Reunions a J+1</h4>
						<form method="post" action="index.php#courses">
							
							<?php	echo '<input type="hidden" name="test2" type="text" id="Name" value="'.$dateD.'"/>';?>
							
							<?php   echo "<select name='lieu'>";
									while ($dataReunionD = mysql_fetch_array($resReunionD)){
										echo	"<option>".$lieu = $dataReunionD['lieu']."</option>";;	
									}
							echo"</select>"; ?>
							<label><input type="submit" name="Bouton" id="Bouton" value="Envoyer" /></label>
						</form>
					</div>
					</div>
				</div>            
        </div>		
	</div>
</section>	
<!-- /Section: reunion -->
	

	
	
<!-- Section: course -->
<?php

if (isset($_POST['lieu'])) { 

//echo $_POST['lieu'].'exist'; 
$lieu = $_POST['lieu'];
} else {
//echo $_POST['lieu'].'exist pas'; 
$lieu = $_GET['lieu2'];
}

if (isset($_POST['test2'])) { 

//echo $_POST['lieu'].'exist'; 
$dateCr = $_POST['test2'];
} else {
//echo $_POST['lieu'].'exist pas'; 
$dateCr = $_GET['dateCr'];
}
//echo $dateCr;
?>

<section id="courses" class="home-section text-center">
	<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Les courses de <?php echo $lieu;?> </h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div align="center" id="stats">
	
<?php
$sqlLastUpdate="select MAX(dateUpdate) from kazak_cheval";
$resLastUpdate = mysql_query($sqlLastUpdate);

$Last = mysql_result ($resLastUpdate,0);
echo "<td>Derniere mise a jour : ".$Last."</td>";



//$dateCr = ($_POST['test2']);


$course2 = $_GET['reunion'];
//echo $lieu2 = $_GET['lieu2']; ;



$sqlreunion="select distinct(prix) from kazak_reunion where lieu='$lieu' and dateReunion='$dateCr' order by id asc";
$resReunion = mysql_query($sqlreunion);
$k=1;
echo '<table id="box-table-a">';
while ($dataReunion = mysql_fetch_array($resReunion)){
	$prix = $dataReunion['prix'];
	$prix2 = $dataReunion['prix'];
	

		echo '<td><a href="index.php?reunion='.$k.'&lieu2='.$lieu.'&prix='.$prix2.'&dateCr='.$dateCr.'#courses"><b>C'.$k.'</B> - '.$prix.'.&nbsp;</a></td>';
		
		
	$k=$k+1;	
}
echo "</table>";
$prix2=$_GET['prix'];
//Echo "<H2>".$prix."</H2>";



//while ($dataLastUpdate = mysql_fetch_array($resLastUpdate)){
//	echo $dateLastUpdate=$dataLastUpdate['dateUpdate'];
	//echo $dateLastUpdate=$dataLastUpdate['id'];
//}

echo "<table id='box-table-a' summary='Entraineur stats'><H5>".$prix2."</h5><h6>Entraineurs <i>(année)</i></H6>
	<tr>
	<th scope='col'>N°</th>
	<th scope='col'>Cheval</th>
	<th scope='col'>Entraineur</th>
	<th scope='col'>2011</th>
	<th scope='col'>2012</th>
	<th scope='col'>2013</th>
	<th scope='col'>2014</th>
	<th scope='col'>2015</th>
	</tr>";
		

$sql = "select * from kazak_reunion where course=$course2 and dateReunion='$dateCr' and lieu='$lieu' order by id asc";
//echo $sql;
//echo "<br>";
$res = mysql_query($sql);
$t=1;
while ($data = mysql_fetch_array($res)){
	
	echo "<tr>";
	$cheval = $data['cheval'];
	//echo "<h2>".$cheval."</h2>";
	//echo "<br>";
	echo "<td>".$t."</td>";
	echo "<td>".$cheval."</td>";
	$entraineur = $data['entraineur'];
	//$valeur = array(1,2);
	echo "<td><a class='info' href='#'>".$entraineur."<span>";
	/////////Calcul la reussite//////////
	echo "<table class='info'><tr>
	<td>";
	reussite(2015,$entraineur);
	echo "</td><td>";
	//reussite(2014,$entraineur);
	echo "</td><td>";
	//reussite(2013,$entraineur);
	echo "</td><td>";
	//reussite(2012,$entraineur);
	echo "</td></tr></table>";
	
	
	for ($i=2011; $i<=2015; $i++){
		
		$sqlCount = "select allocEntraineur from kazak_alloc where annee = '$i' and entraineur='$entraineur'";
		//echo $sqlCount;
		//echo "<br>";
		$resCount = mysql_query($sqlCount)or exit('Erreur SQL ligne '.__LINE__.' : '.mysql_error());
		$result = mysql_result ($resCount,0);
		echo "<td>".$result."</td>";
		
	}
	$t=$t+1;
}
echo "</tr><table></div>";	

//////////////////////////mois////////////////////////////
/////////////////////2015////////////////////////////////


echo '<table id="box-table-a" summary="mois"><h6>Entraineurs <i>(mois)</i></H6>
	<tr>
		<th scope="col">N°</th>
		<th scope="col">cheval</th>
		<th scope="col">entraineur</th>
		<th scope="col">Janvier</th>
		<th scope="col">Février</th>
		<th scope="col">Mars</th>
		<th scope="col">Avril</th>
		<th scope="col">Mai</th>
		<th scope="col">Juin</th>
		<th scope="col">Juillet</th>
		<th scope="col">Aout</th>
		<th scope="col">Septembre</th>
		<th scope="col">Octobre</th>
		<th scope="col">Novembre</th>
		<th scope="col">Decembre</th>
	</tr>';
		

$sqlMois = "select * from kazak_reunion where course=$course2 and dateReunion='$dateCr' and lieu='$lieu' order by id asc";
//echo $sql;
//echo "<br>";
$resMois = mysql_query($sqlMois);
$t=1;
while ($dataMois = mysql_fetch_array($resMois)){
	echo "<tr>";
	$cheval = $dataMois['cheval'];
	//echo "<h2>".$cheval."</h2>";
	//echo "<br>";
	echo "<td>".$t."</td>";
	echo "<td>".$cheval."</td>";
	$entraineur = $dataMois['entraineur'];
	echo "<td>".$entraineur."</td>";
	
	for ($u=1; $u<13; $u++){
		
		$sqlCountMois = "select allocEntraineur from kazak_allocMois where mois = $u and entraineur='$entraineur' and annee=2015";
		//echo $sqlCountMois;
		//echo "<br>";
		$resCountMois = mysql_query($sqlCountMois)or exit('Erreur SQL ligne '.__LINE__.' : '.mysql_error());
		$resultMois = mysql_result ($resCountMois,0);
		echo "<td>".$resultMois."</td>";
		
	}
		$t=$t+1;

}


////////////////////////////////////Driver/////////////////////////////

///////////////////////////////////Annee///////////////////////////////

echo '<table id="box-table-a" summary="Driver stats"><h6>Drivers <i>(année)</i></H6>
	<tr>
	<th scope="col">N°</th>
	<th scope="col">Cheval</th>
	<th scope="col">Driver</th>
	<th scope="col">2014</th>
	<th scope="col">2015</th>
	</tr>';
		

$sql = "select * from kazak_reunion where course=$course2 and dateReunion='$dateCr' and lieu='$lieu' order by id asc";
//echo $sql;
//echo "<br>";
$res = mysql_query($sql);
$t=1;
while ($dataDriverA = mysql_fetch_array($res)){
	
	echo "<tr>";
	$cheval = $dataDriverA['cheval'];
	//echo "<h2>".$cheval."</h2>";
	//echo "<br>";
	echo "<td>".$t."</td>";
	echo "<td>".$cheval."</td>";
	$driver = $dataDriverA['jockey'];
	echo "<td>".$driver."</td>";
	
	for ($i=2014; $i<=2015; $i++){
		
		$sqlCountDA = "select SUM(allocDriver) from kazak_allocDriver where annee = '$i' and driver='$driver'";
		//echo $sqlCountDA;
		//echo "<br>";
		$resCountDA = mysql_query($sqlCountDA)or exit('Erreur SQL ligne '.__LINE__.' : '.mysql_error());
		$resultDA = mysql_result ($resCountDA,0);
		echo "<td>".$resultDA."</td>";
		
	}
	$t=$t+1;
}
echo "</tr><table></div>";	


///////////////////////////////////////Mois//////////////////////////////////////////

echo "</tr><table></div>";	
//echo $dateCr;
//echo $lieu;

echo '<table id="box-table-a" summary="mois"><h6>Drivers <i>(mois)</i></H6>
	<tr>
		<th scope="col">N°</th>
		<th scope="col">Cheval</th>
		<th scope="col">Driver</th>
		<th scope="col">Janvier</th>
		<th scope="col">Février</th>
		<th scope="col">Mars</th>
		<th scope="col">Avril</th>
		<th scope="col">Mai</th>
		<th scope="col">Juin</th>
		<th scope="col">Juillet</th>
		<th scope="col">Aout</th>
		<th scope="col">Septembre</th>
		<th scope="col">Octobre</th>
		<th scope="col">Novembre</th>
		<th scope="col">Decembre</th>
	</tr>';
		

$sqlMois = "select * from kazak_reunion where course=$course2 and dateReunion='$dateCr' and lieu='$lieu' order by id asc";
//echo $sql;
//echo "<br>";
$resMois = mysql_query($sqlMois);
$t=1;
while ($dataMois = mysql_fetch_array($resMois)){
	echo "<tr>";
	$cheval = $dataMois['cheval'];
	//echo "<h2>".$cheval."</h2>";
	//echo "<br>";
	echo "<td>".$t."</td>";
	echo "<td>".$cheval."</td>";
	$driver = $dataMois['jockey'];
	echo "<td>".$driver."</td>";
	
	for ($u=1; $u<13; $u++){
		
		$sqlCountMois = "select allocDriver from kazak_allocDriver where mois = $u and driver='$driver' and annee=2015";
		//echo $sqlCountMois;
		//echo "<br>";
		$resCountMois = mysql_query($sqlCountMois)or exit('Erreur SQL ligne '.__LINE__.' : '.mysql_error());
		$resultMois = mysql_result ($resCountMois,0);
		echo "<td>".$resultMois."</td>";
		
	}
		$t=$t+1;

}
echo "</tr><table></div>";

///////////////////////////////////engagement/////////////////////


$sql="select * from kazak_reunion where dateReunion='$dateCr' and lieu='$lieu'"; 
$res=mysql_query($sql);

//var_dump($res);
$i=0;
$arrayEntraineur=array();
while ($data = mysql_fetch_array($res)){
	
		$entraineur=$data['entraineur'];	
		//echo $entraineur;
		
		$arrayEntraineur[]= $entraineur;
		//echo 	$arrayEntraineur[$i];	
		//echo $i=$i+1;
		//echo "<br>";

}

$result=(array_count_values($arrayEntraineur));


	echo '<table id="box-table-a" summary="mois"><h6>Engagement</H6>
	<tr>
		<th scope="col">Entraineur</th>
		<th scope="col">Chevaux engagé</th>
		<th scope="col">Course</th>
		<th scope="col">Prix</th>
		<th scope="col">Cheval</th>		
	</tr>';
	foreach ($result as $cle=>$value){
		

		
		// echo $cle.' => '.$value.'<br/>';
		 
		 if ($value > 1){
			 
			 $sqlEngage="select * from kazak_reunion where dateReunion='$dateCr' and entraineur='$cle' and lieu='$lieu' order by course asc	";
			 $resEngage=mysql_query($sqlEngage) or exit('Erreur SQL ligne '.__LINE__.' : '.mysql_error());
			 
						echo '<tr>
						<td rowspan='.$value.'>'.$cle.'</td>
						<td rowspan='.$value.'>'.$value.'</td>';
			 
			 while ($dataEngage = mysql_fetch_array($resEngage)){
				 
				 $cheval=$dataEngage['cheval'];
				 $course=$dataEngage['course'];
				 $prix=$dataEngage['prix'];
				 
				
						
						echo '<td>'.$course.'</td>
						<td>'.$prix.'</td>
						<td>'.$cheval.'</td>
						</tr>';
				 
			 }
			 
		 }	 
			 
	}

	

echo '</table>';


/////////////////////////////////////////////////////HIPPODROME/////////////////////////////////
$sqlHippoJour="select distinct(reunion) from kazak_reunion where dateReunion='2015-11-22'";

echo '<table id="box-table-a" summary="mois"><h6>HIPPODROME<i>(mois)</i></H6>
	<tr>
		<th scope="col">entraineur</th>
		<th scope="col">Janvier</th>
		<th scope="col">Février</th>
		<th scope="col">Mars</th>
		<th scope="col">Avril</th>
		<th scope="col">Mai</th>
		<th scope="col">Juin</th>
		<th scope="col">Juillet</th>
		<th scope="col">Aout</th>
		<th scope="col">Septembre</th>
		<th scope="col">Octobre</th>
		<th scope="col">Novembre</th>
		<th scope="col">Decembre</th>
	</tr>';
		

$sqlMois = "select * from kazak_reunion where course=$course2 and dateReunion='$dateCr' and lieu='$lieu' order by id asc";
//echo $sql;
//echo "<br>";
$resMois = mysql_query($sqlMois);
$t=1;
while ($dataMois = mysql_fetch_array($resMois)){
	echo "<tr>";
	$cheval = $dataMois['cheval'];
	//echo "<h2>".$cheval."</h2>";
	//echo "<br>";
	echo "<td>".$t."</td>";
	echo "<td>".$cheval."</td>";
	$entraineur = $dataMois['entraineur'];
	echo "<td>".$entraineur."</td>";
	
	for ($u=1; $u<13; $u++){
		
		$sqlCountMois = "select allocEntraineur from kazak_allocMois where mois = $u and entraineur='$entraineur' and annee=2015";
		//echo $sqlCountMois;
		//echo "<br>";
		$resCountMois = mysql_query($sqlCountMois)or exit('Erreur SQL ligne '.__LINE__.' : '.mysql_error());
		$resultMois = mysql_result ($resCountMois,0);
		echo "<td>".$resultMois."</td>";
		
	}
		$t=$t+1;

}




?>

</div>
</section>
<!-- /Section: course -->



		
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#courses" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
					
				</div>
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>

</body>

</html>
