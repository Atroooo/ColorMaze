<!DOCTYPE html>
<html>
<head>
	<?php include 'headers.html'; ?>
</head>
<body>
	<?php include 'fonction.php'; ?>

	<?php
		$sizex = $_GET['sizex'];

		$sizey = $_GET['sizey'];

		$color = $_GET['color'];

		$flag = 0;
		$flag2 = 0;
		$flag3 = 0;
		if(isset($_SESSION['placementgoal'])){
            if($_SESSION['placementgoal']){
                if(isset($_SESSION['goalplace'])){
                    if ($_SESSION['goalplace']){
                        $flag3 = 1;
                        $flag = 1;
                        $_SESSION['alertgoal'] = true;
                        header("location:editeur_action.php");
                        $_SESSION['affichage'] = true;
                        $_SESSION['placementgoal'] = false;
                    }
                }
                if($_SESSION['placementgoal'] && $flag3 == 0){
                    $flag = 1;
                    $_SESSION['placementgoal'] = false;
                    $lab = $_SESSION['currentmaze'];
                    $lab[$sizey][$sizex] = 5;
                    $_SESSION['goalplace'] = true;
                    $_SESSION['affichage'] = true;
                    switch ($color) {
                        case "rouge":
                            $_SESSION['labyrintheR'] = $lab;
                            header('Location:editeur_action.php');
                        break;

                        case "bleu":
                            $_SESSION['labyrintheB'] = $lab;
                            header('Location:editeur_action.php');
                        break;

                        case "vert":
                            $_SESSION['labyrintheV'] = $lab;
                            header('Location:editeur_action.php');
                        break;

                        case "jaune":
                            $_SESSION['labyrintheJ'] = $lab;
                            header('Location:editeur_action.php');
                        break;
                    }
                }
            }
        }
		if(isset($_SESSION['placementperso'])){
            if($_SESSION['placementperso']){
                if(isset($_SESSION['persoplace'])){
                    if ($_SESSION['persoplace']){
                        $flag2 = 1;
                        $flag = 1;
                        $_SESSION['alertperso'] = true;
                        header("location:editeur_action.php");
                        $_SESSION['affichage'] = true;
                        $_SESSION['placementperso'] = false;
                    }
                }
                if($_SESSION['placementperso'] && $flag2 == 0){
                    $flag = 1;
                    $_SESSION['placementperso'] = false;
                    $lab = $_SESSION['currentmaze'];
                    $lab[$sizey][$sizex] = 3;
                    $_SESSION['sizey'] = $sizey;
                    $_SESSION['sizex'] = $sizex;
                    $_SESSION['persoplace'] = true;
                    $_SESSION['affichage'] = true;
                    switch ($color) {
                        case "rouge":
                            $_SESSION['labyrintheR'] = $lab;
                            header('Location:editeur_action.php');
                        break;

                        case "bleu":
                            $_SESSION['labyrintheB'] = $lab;
                            header('Location:editeur_action.php');
                        break;

                        case "vert":
                            $_SESSION['labyrintheV'] = $lab;
                            header('Location:editeur_action.php');
                        break;

                        case "jaune":
                            $_SESSION['labyrintheJ'] = $lab;
                            header('Location:editeur_action.php');
                        break;
                    }
                }
            }
        }


		if($flag == 0){
			switch ($color){
			  case "rouge":
			   	$labyrintheR = $_SESSION['labyrintheR'];
			   	//$labyrintheR[$sizey][$sizex] = '<img class="case" src="images/caserouge.png" >';
                $labyrintheR[$sizey][$sizex] = 0;
			   	$_SESSION['labyrintheR'] = $labyrintheR;
			  break;

			  case "vert":
			   	$labyrintheV = $_SESSION['labyrintheV'];
			  	//$labyrintheV[$sizey][$sizex] = '<img class="case" src="images/caseverte.png" >';
                $labyrintheV[$sizey][$sizex] = 0;
			  	$_SESSION['labyrintheV'] = $labyrintheV;
			  break;

			  case "bleu":
			   	$labyrintheB = $_SESSION['labyrintheB'];
			   	//$labyrintheB[$sizey][$sizex] = '<img class="case" src="images/casebleue.png" >';
                $labyrintheB[$sizey][$sizex] = 0;
			   	$_SESSION['labyrintheB'] = $labyrintheB;
			  break;

			  case "jaune":
			   	$labyrintheJ = $_SESSION['labyrintheJ'];
			   	//$labyrintheJ[$sizey][$sizex] = '<img class="case" src="images/casejaune.png" >';
                $labyrintheJ[$sizey][$sizex] = 0;
			   	$_SESSION['labyrintheJ'] = $labyrintheJ;
			  break;
		 	}

			$_SESSION['affichage'] = true;


			header('Location:editeur_action.php');
		}


?>
</body>
</html>