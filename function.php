<?php

///////////////Formate la date pour insert dans BDD/////////////////////////////
function calculDate($date){
	
			
				
			$arrayDate=explode("/",$date);
			//echo $arrayDate[2];
			//echo "<br>";
			if ($arrayDate[2] === "janvier"){
					$mois = 1;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "février"){
					$mois = 2;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "mars"){
					$mois = 3;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "avril"){
					$mois = 4;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "mai"){
					$mois = 7;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
				if ($arrayDate[2] === "juin"){
					$mois = 6;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "juillet"){
					$mois = 7;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "mars"){
					$mois = 3;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "juin"){
					$mois = 6;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "juillet"){
					$mois = 7;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
				if ($arrayDate[2] === "août"){
					$mois = 8;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if (strcmp($arrayDate[2] , "septembre")===0){
				
					$mois = 9;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
					
					//echo $date;
			}
			if ($arrayDate[2] === "octobre"){
					$mois = 10;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "novembre"){
					$mois = 11;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}
			if ($arrayDate[2] === "décembre"){
					$mois = 12;
					$jour = $arrayDate[1];
					$annee = $arrayDate[3];
					$date = $annee.'-'.$mois.'-'.$jour;
			}

return $date;
	
}




////////////////////////////////////Calucul la reussite par année. Affiche en info bulle dans la stat entraineur par année./////////////////
function reussite($date,$ent){
	
	$sqlReussite="select * from kazak_cheval where entraineur='$ent' and dateAnnee='$date' and rang between 1 and 3"; 
	$resReussite=mysql_query($sqlReussite);

//var_dump($res);
	echo "<b>".$ent." <i>(".$date.")</i></b>";
	echo "<br>";
	//echo "<table><tr><td>";
	$arrayHypodrome=array();
	while ($dataReussite = mysql_fetch_array($resReussite)){
	
		$hypodrome=$dataReussite['hypodrome'];	
		//echo $entraineur;
		
		$arrayHypodrome[]= $hypodrome;
		//echo 	$arrayEntraineur[$i];	
		//echo $i=$i+1;
		//echo "<br>";

	}

	$result=(array_count_values($arrayHypodrome));
	arsort($result);

	foreach ($result as $cle=>$value){
		
		// echo $cle.' => '.$value.'<br/>';
		 
		 if ($value > 3){
			 
			echo $cle.' => '.$value.'<br/>';
		 }
		 //else {echo "moins de 3 reussites pour l'ensemble des hippodromes";	 }
	} 
	
	
	
 echo "</span></a>";
	
	
}


function statAnnee($prix2, $course2, $dateCr,$lieu, $alloc, $type, $base){
	
	
echo "<table id='box-table-a' summary='Entraineur stats'><H5>".$prix2."</h5><h6>Entraineurs <i>(année)</i></H6>
	<tr>
	<th scope='col'>N°</th>
	<th scope='col'>Cheval</th>
	<th scope='col'>".$type."</th>
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
	$nom = $data['$type'];
	//$valeur = array(1,2);
	echo "<td><a class='info' href='#'>".$nom."<span>";
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
		
		$sqlCount = "select $alloc from $base where annee = '$i' and $type='$nom'";
		//echo $sqlCount;
		//echo "<br>";
		$resCount = mysql_query($sqlCount)or exit('Erreur SQL ligne '.__LINE__.' : '.mysql_error());
		$result = mysql_result ($resCount,0);
		echo "<td>".$result."</td>";
		
	}
	$t=$t+1;
}
echo "</tr><table></div>";	
	
}




function curl($url){
	
		$postfields = array();
		$postfields["urlRedirection"] = "";
		$postfields["login"] = "eloreg001@yahoo.fr";
		$postfields["password"] = "azerty13";
		$postfields["memoriser"]=false;
		$postfields["x"]=90;
		$postfields["y"]=23;


		$ch = curl_init($url); 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true); 
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1090.0 Safari/536.6');


		if (preg_match('`^https://`i', $url)) 
		{ 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
		} 

		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

		// Utilisation de la méthode POST 
		curl_setopt($ch, CURLOPT_POST, true); 

		// Définition des champs et valeurs à envoyer 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields); 
		echo $html = curl_exec($ch); 

		curl_close($ch); 
		
		return $html;


	
}

?>


