<!DOCTYPE html>
<html>
<head>
	<?php include'headers.html'; ?>
</head>
<body style="background: #171719;color: white;">
	<?php include 'navbar.html';
		include 'connexion.php';
	?>

	<?php 
		if(isset($_POST['nom'])){
			$name = $_POST['nom'];
		}
		else{
			$name="LAB";
		}
		$level=1;
		$score=0;
		$request="SELECT ID FROM leaderboard";
    	$result=mysqli_query($link,$request);
    	while ($row = mysqli_fetch_assoc($result)){
        	$id=$row["ID"]+1;
		}
		for($i=0; $i < 6; $i++){
			$request="INSERT INTO leaderboard VALUES ('".$name."',".$score.",".$level.",".$id.")";
			$result=mysqli_query($link,$request);
			$level=$level+1;
			if($result == FALSE){
				echo "<p> Erreur d'exécution de la requete </p>";
				echo mysqli_errno($link). ": ".mysqli_error($link). "\n";
				die();
			}
		}
		

	?>
	<center style="margin-top: 100px;">
		<h1 style="background-image: url(images/textlogobg.jpg);background-clip: text;-webkit-background-clip: text;color: transparent;font-size: 1000%;margin-bottom: 70px;">YOU'RE ABOUT TO PLAY</h1>
		<h1>Prepare for the tutorial</h1>
		<a href="tuto.php" class="button">PLAY</a>
	</center>
</body>
</html>