<!doctype html>
<html lang="fr">
<meta charset="utf-8">
<head>
<link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
</head>
<table border="2">
<tr>
<td  class="titre">STAGIAIRE</td><td class="titred">AGE</td>
</tr>
<?php
// charger le fichier XML
$url = 'classe-simploniens.xml';
$xml = simplexml_load_file($url);

// defini la zone horaire
date_default_timezone_set("UTC");
 
//recupere la date du jour au format souhaité
$datej=date("Y-m-d"); 
$date1=date_create("$datej"); 

// crée un tableau vide
$t = []; 

// boucle
foreach ($xml as $i) {

// récupere les dates de naissance dans le fichier XML
$diffconvert = $i->date_naissance; 
$date2=date_create($diffconvert); 

// calcul la différence entre 2 dates
$diffe=date_diff($date1,$date2); 

// renvoi la différence des 2 dates sous le format année
$years = $diffe->y; 

// renvoi les noms en majuscules
$str = $i->nom;
$str = strtoupper($str);

// associe noms et prenoms avec les ages
$a = $str." ".$i->prenom;
$b = $years." ans";
$t[$a] = $b;
}

// tri les ages par ordre croissant 
asort($t);

// affiche les résultats dans un tableau 
foreach($t as $key => $value){
echo "<tr><td class='tab'>".$key."</td>
<td class='tabd'> ".$value."  </td></tr>" ;
}
?>
</table>
</html>   












<style>
.titre {
font-family: Righteous;
text-align: center;
border:1px solid black; background-color: #70BD13; border-radius: 5px;
text-align:center; 
font-weight: bold;
font-size: 20px;
height: 25px;
padding: 3px;
width : 200px;
}
.titred {
font-family: Righteous;
text-align: center;
border:1px solid black; background-color: red; border-radius: 5px;
text-align:center; 
font-weight: bold;
font-size: 20px;
height: 25px;
padding: 3px;
width : 70px;
}
.tab {
text-align: center;
border:1px solid black; background-color: #CEF6CE; border-radius: 2px;
text-align:left; 
font-weight: bold;
font-size: 15px;
height: 25px;
padding: 3px;
padding-left: 20px;
}
.tabd {
text-align: center;
border:1px solid black; background-color: #F3E2A9; border-radius: 2px;
text-align:center; 
font-weight: bold;
font-size: 15px;
height: 25px;
padding: 3px;
}
</style>

