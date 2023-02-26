<!DOCTYPE html>
<html>
<head>
	<?php include 'headers.html'; ?>
</head>
<body>
	<?php 
	include'navbar.html';
	?>

	<?php include 'fonction.php'; include 'habi_laby.php';?>

	<?php

$mat=$_SESSION['size'];
$labR=$_SESSION['labyrintheR'];
$labB=$_SESSION['labyrintheB'];
$labV=$_SESSION['labyrintheV'];
$labJ=$_SESSION['labyrintheJ'];
$posX = $_SESSION['sizex'];
$posY = $_SESSION['sizey'];

$_SESSION['taille'] = $mat;
$_SESSION['R'] = $labR;
$_SESSION['B'] = $labB;
$_SESSION['J'] = $labV;
$_SESSION['V'] = $labJ;
$_SESSION['perso_posX'] = $posX;
$_SESSION['perso_posY'] = $posY;



$labyR="";
$labyB="";
$labyV="";
$labyJ="";
$txt= fopen("Colormazetxt\\LabR.txt","w+");
fwrite($txt,$mat."\n");
for($i=0;$i<$mat;$i++){
	for($j=0;$j<$mat;$j++){
		fwrite($txt,$labR[$i][$j]."");
	}
	fwrite($txt,"\n");
}

$txt2= fopen("Colormazetxt\\LabB.txt","w+");
for($i=0;$i<$mat;$i++){
	for($j=0;$j<$mat;$j++){
		fwrite($txt2,$labB[$i][$j]."");
	}
	fwrite($txt2,"\n");
}

$txt3= fopen("Colormazetxt\\LabV.txt","w+");
for($i=0;$i<$mat;$i++){
	for($j=0;$j<$mat;$j++){
		fwrite($txt3,$labV[$i][$j]."");
	}
	fwrite($txt3,"\n");
}

$txt4= fopen("Colormazetxt\\LabJ.txt","w+");
for($i=0;$i<$mat;$i++){
	for($j=0;$j<$mat;$j++){
		fwrite($txt4,$labJ[$i][$j]."");
	}
	fwrite($txt4,"\n");
}
fclose($txt);
fclose($txt2);
fclose($txt3);
fclose($txt4);
exec("ColorMaze.exe");
$txtf= fopen("Colormazetxt\\Verif.txt","r+");

$verifi=fgets($txtf, 100);
if($verifi=='0'){
	echo "Unsolvable";

}else{
	echo "Solvable in ".$verifi." moves";
	echo "</br>";
	echo "</br>";
	echo "<center style=''><a href='niv_cree_play.php' class='button'>PLAY</a></center>";
}

fclose($txtf);

?>


</body>
</html>