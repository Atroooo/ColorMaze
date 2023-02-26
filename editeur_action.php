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

	if(isset($_SESSION['alertperso'])){
		if($_SESSION['alertperso'] == true){
			?><div class="alert alert-danger" role="alert" style="width:80%;border-radius: 10px;">Vous avez déjà placé un personnage</div><?php
			$_SESSION['alertperso'] = false;
		}
	}
	if(isset($_SESSION['alertgoal'])){
		if($_SESSION['alertgoal'] == true){
			?><div class="alert alert-danger" role="alert" style="width:80%;border-radius: 10px;">Vous avez déjà placé une arrivée</div><?php
			$_SESSION['alertgoal'] = false;
		}
	}
	function showme($labyrinthe,$color,$size){
		for ($i = 0; $i < $size; $i++) {
			for ($j = 0; $j < $size; $j++) {
				if($labyrinthe[$i][$j]==1){
					$labyrinthe[$i][$j] = '<a href="color.php?sizex='.$j.'&amp;sizey='.$i.'&amp;color='.$color.'"><img class="case" style="border: 1px solid white " src="images/mur.png"/></a>';
					echo $labyrinthe[$i][$j]." ";
				}
				elseif($labyrinthe[$i][$j]==3){
					$labyrinthe[$i][$j] = '<img class="animationperso" style="border: 1px solid white " src="images/personnage.png"/>';
					echo $labyrinthe[$i][$j]." ";
				}
				elseif($labyrinthe[$i][$j]==5){
					$labyrinthe[$i][$j] = '<img class="case" style="border: 1px solid white " src="images/arrivee.png"/>';
					echo $labyrinthe[$i][$j]." ";
				}
				else if($labyrinthe[$i][$j] == 0){
					if($color == 'rouge'){
						$labyrinthe[$i][$j] = '<img class="case" src="images/caserouge.png" >';
						echo $labyrinthe[$i][$j]." ";
					}
					if($color == 'bleu'){
						$labyrinthe[$i][$j] = '<img class="case" src="images/casebleue.png" >';
						echo $labyrinthe[$i][$j]." ";
					}
					if($color == 'vert'){
						$labyrinthe[$i][$j] = '<img class="case" src="images/caseverte.png" >';
						echo $labyrinthe[$i][$j]." ";
					}
					if($color == 'jaune'){
						$labyrinthe[$i][$j] = '<img class="case" src="images/casejaune.png" >';
						echo $labyrinthe[$i][$j]." ";
					}
				}
				/*else{
					echo $labyrinthe[$i][$j]." ";
				}*/
			}
		echo "</br>";
		}	
	}
	?>
	<?php

	if (isset($_POST['size'])){
    	$size=$_POST['size'];
    	$_SESSION['size'] = $size;
	}
	else{
   		if(isset($_SESSION['size'])){
        	$size=$_SESSION['size'];
   		} 
	}

	if(!isset($_SESSION['count10'])){
	    $count10 = 0;
	}
	else{
		$count10 = $_SESSION['count10'];
	}

	if($count10 == 0){
	    for($i=0; $i< $size;$i++){
	        for($j=0; $j< $size;$j++){
	            $labyrintheR[$i][$j] = 1;
	            $labyrintheB[$i][$j] = 1;
	            $labyrintheV[$i][$j] = 1;
	            $labyrintheJ[$i][$j] = 1;
	        }
	    }
	    $count10 = 1;
	    $_SESSION['count10'] = $count10;
	    $_SESSION['color'] = "rouge";
	    $_SESSION['currentmaze'] = $labyrintheR;
	    $_SESSION['labyrintheR'] = $labyrintheR;
	    $_SESSION['labyrintheB'] = $labyrintheB;
	    $_SESSION['labyrintheV'] = $labyrintheV;
	    $_SESSION['labyrintheJ'] = $labyrintheJ;
	    showme($labyrintheR,$_SESSION['color'],$size);
	}

	$labyrintheR = $_SESSION['labyrintheR'];
	$labyrintheB = $_SESSION['labyrintheB'];
	$labyrintheV = $_SESSION['labyrintheV'];
	$labyrintheJ = $_SESSION['labyrintheJ'];

	if(isset($_SESSION['affichage'])){
		if ($_SESSION['affichage'] == true) {
			switch ($_SESSION['color']) {
				case "rouge":
					$lab = $_SESSION['labyrintheR'];
				break;
				case "bleu":
					$lab = $_SESSION['labyrintheB'];
				break;
				case "vert":
					$lab = $_SESSION['labyrintheV'];
				break;
				case "jaune":
					$lab = $_SESSION['labyrintheJ'];
				break;
			}
			showme($lab,$_SESSION['color'],$size);
			$_SESSION['affichage'] = false;
		}
	}

	if(isset($_POST['button5'])){
	    $_SESSION['color']="rouge";
	}
	if(isset($_POST['button6'])){
	    $_SESSION['color']="bleu";
	}
	if(isset($_POST['button7'])){
	    $_SESSION['color']="vert";
	}
	if(isset($_POST['button8'])){
	    $_SESSION['color']="jaune";
	}


	 function switche2($nextLabyrinth,$color,$size){
        if ($_SESSION['color'] == "rouge"){
            $nextLabyrinth=$_SESSION['labyrintheR'];
            showme($nextLabyrinth,$_SESSION['color'],$size);
            $_SESSION['currentmaze'] = $nextLabyrinth;
        }
        elseif($_SESSION['color'] == "bleu"){
            $nextLabyrinth=$_SESSION['labyrintheB'];
            showme($nextLabyrinth,$_SESSION['color'],$size);
            $_SESSION['currentmaze'] = $nextLabyrinth;
        }
        elseif ($_SESSION['color'] == "vert"){
            $nextLabyrinth=$_SESSION['labyrintheV'];
            showme($nextLabyrinth,$_SESSION['color'],$size);
            $_SESSION['currentmaze'] = $nextLabyrinth;
            
        }
        elseif ($_SESSION['color'] == "jaune"){
            $nextLabyrinth=$_SESSION['labyrintheJ'];
            showme($nextLabyrinth,$_SESSION['color'],$size);
            $_SESSION['currentmaze'] = $nextLabyrinth;
        }
    }


        if(isset($_POST['button5'])){
            switche2($labyrintheR,"rouge",$size);
        }
        if(isset($_POST['button6'])){
              switche2($labyrintheB,"bleu",$size);
        }
        if(isset($_POST['button7'])){
              switche2($labyrintheV,"vert",$size);
        }
        if(isset($_POST['button8'])){
              switche2($labyrintheJ,"jaune",$size);
        }
        if(isset($_POST['button9'])){
        	$_SESSION['placementperso'] = true;
            switche2($_SESSION['currentmaze'],$_SESSION['color'],$size);
        }
        if(isset($_POST['button10'])){
			$_SESSION['placementgoal'] = true;
            switche2($_SESSION['currentmaze'],$_SESSION['color'],$size);
        }
?>


<form  method="post">
    <input type="submit" name="button5" class="case" style="background-color: #fe3547;color: #fe3547;border : 0;margin: 30px 5px 0 5px;">
    <input type="submit" name="button7" class="case" style="background-color: #5bdb31;color: #5bdb31;border : 0;margin: 30px 5px 0 5px;">
    <input type="submit" name="button6" class="case" style="background-color: #228be6;color: #228be6;border : 0;margin: 30px 5px 0 5px;">
    <input type="submit" name="button8" class="case" style="background-color: #f4d20e;color: #f4d20e;border : 0;margin: 30px 5px 0 5px;">
    <input type="submit" name="button9" class="case" style="background-color: #FFFFFF;color: #FFFFFF;border : 0;margin: 30px 5px 0 5px;">
    <input type="submit" name="button10" class="case" style="background-image: url(images/arrivee.png);border : 0;margin: 30px 5px 0 5px;">
</form>


<form method="post" action="save.php">
	<input type="submit" name="button11" class="save" value="Save" style="position:absolute;left:43%;bottom:15%;border-radius:20px;border:1px solid white;background:transparent;font-size:200%;width:300px;color: white;">
</form>

<a href="editeur.php" id="target" style="position:absolute;left:43%;bottom:5%;border-radius:20px;border:1px solid white;background:transparent;font-size:200%;width:300px;color: white;">RESET</a>

<script type="text/javascript">
  	var element = document.getElementById("target");

 	element.scrollIntoView();
</script>


</body>
</html>