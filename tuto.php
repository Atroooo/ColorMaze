<!DOCTYPE html>
<html>
<head>
  <?php 
include("fonction.php");
include 'headers.html'; 

$level = 0;
if (isset($_SESSION['level'])){
      if($_SESSION['level']!=$level){
        session_destroy();
      }
    }
 $_SESSION['level']=$level;

?>
</head>
<body style="background: #171719;color: white;">
<?php
  include 'connexion.php';
?>
  <center>  

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="position : absolute;left:-7%;color: black;">
  <div class="modal-dialog">
    <div class="modal-content" style="width : 150%;">
      <div class="modal-header">
        <h5 class="modal-title" style="text-align:center;">YOU WON</h5>
      </div>
      <div class="modal-body">
        <p>SCORE:<?php echo $_SESSION['countDeplacement'] + 1 ?></p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="niveau1.php">NEXT LEVEL</a></button>
      </div>
    </div>
  </div>
</div>

<?php include ("navbar.html"); ?>

<script type="text/javascript">
a = "0"
b = "0"
c = "0"
d = "0"
document.onkeydown = checkKey;

var e = e || window.event;
function checkKey(e) {

    if (e.keyCode == '90' || e.keyCode == '38'){
      a = "1"  
    }
    else if (e.keyCode == '68' || e.keyCode == '39'){
      b = "1"
    }
    else if (e.keyCode == '83' || e.keyCode == '40'){
      c = "1"
    }
    else if (e.keyCode == '81' || e.keyCode == '37'){
      d = "1"
    }
    window.location.href = "tuto.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
}

</script>
<?php

if(!(isset($_GET["a"]))){
  $a = 0;
}
else{
  $a = $_GET["a"];
}
if(!(isset($_GET["b"]))){
  $b = 0;
}
else{
  $b = $_GET["b"];
}
if(!(isset($_GET["c"]))){
 $c = 0;
}
else{
  $c = $_GET["c"];
}
if(!(isset($_GET["d"]))){
  $d = 0;
}
else{
  $d = $_GET["d"];
}

if($a == 1){
  $_POST['button1']=1;
  $_SESSION['set']=1;
?>
<script>
  a = "0"
  b = "0"
  c = "0"
  d = "0"
  window.location.href = "tuto.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
</script>
<?php
}
if ($b==1){
  $_POST['button3']=1;
  $_SESSION['set']=1;
  ?>
<script>
  a = "0"
  b = "0"
  c = "0"
  d = "0"
  window.location.href = "tuto.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
</script>
<?php
}
if ($c==1){
  $_POST['button4']=1;
  $_SESSION['set']=1;
  ?>
<script>
  a = "0"
  b = "0"
  c = "0"
  d = "0"
  window.location.href = "tuto.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
</script>
<?php
}
if ($d==1){
  $_POST['button2']=1;
  $_SESSION['set']=1;
  ?>
<script>
  a = "0"
  b = "0"
  c = "0"
  d = "0"
  window.location.href = "tuto.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
</script>
<?php
}

include("habi_laby.php");

$largeur = 6;
$longueur = 6;


$labyrintheR = array(
      array(1,1,1,1,1,1),
      array(1,1,1,1,5,1),
      array(1,1,1,1,0,1),
      array(1,0,1,1,0,1),
      array(1,0,1,1,1,1),
      array(1,1,1,1,1,1)
    );

    $labyrintheB = array(
      array(1,1,1,1,1,1),
      array(1,1,1,1,1,1),
      array(1,1,1,1,1,1),
      array(1,0,0,0,0,1),
      array(1,1,1,1,1,1),
      array(1,1,1,1,1,1)
    );

/*if(!(isset($_SESSION["count"]))){
        $count = 0;
        $labyrintheR[4][1]=3;
        affichage($labyrintheR,$longueur,$largeur,'rouge');
        $labyrintheR[4][1]=0;
      }*/

 if(!(isset($_SESSION["count2"]))){
      $count2 = 0;
    }
    else{
      $count2 = $_SESSION["count2"];
    }

    if ($count2 == 0){
        $count2++;
        $_SESSION["count2"] = $count2;
        $_SESSION['color'] = 'rouge';
        $_SESSION['labyrinthe'] = $labyrintheR;
        $_SESSION['arrivee'] = 0;
    }

if(!isset($_SESSION["count3"])){
  ?>  
  <script type="text/javascript">
      $("#debut").modal();
  </script> 
  <?php
  $_SESSION["count3"] = 1;
  $labyrintheR[4][1]=3;
  affichage($labyrintheR,$longueur,$largeur,'rouge');
}

deplacement($_SESSION['labyrinthe'],$longueur,$largeur,$_SESSION['color'],4,1);

if(isset($_SESSION["arrivee2"])){
  ?>  
    <script type="text/javascript">
        $("#staticBackdrop").modal();
    </script> 
    
    <script>
      var audio = new Audio('son/fin.mp3');
      audio.play();
    </script>

  <?php

   session_destroy();
  }
if($_SESSION["arrivee"] == 1){
  $_SESSION["arrivee2"] = 1;
  if(isset($_POST['button1'])&& $_POST['button1']!= 1){
    ?>
    <script type="text/javascript">
          $("#staticBackdrop").modal();
      </script> 

          <script>
      var audio = new Audio('son/fin.mp3');
      audio.play();
    </script>
      <?php
      session_destroy();
  }
  if(isset($_POST['button2'])&& $_POST['button2']!= 1){
    ?>
    <script type="text/javascript">
          $("#staticBackdrop").modal();
      </script> 

          <script>
      var audio = new Audio('son/fin.mp3');
      audio.play();
    </script>
      <?php
      session_destroy();
  }
  if(isset($_POST['button3'])&& $_POST['button3']!= 1){
    ?>
    <script type="text/javascript">
          $("#staticBackdrop").modal();
      </script> 

          <script>
      var audio = new Audio('son/fin.mp3');
      audio.play();
    </script>
      <?php
      session_destroy();
  }
  if(isset($_POST['button4'])&& $_POST['button4']!= 1){
    ?>
    <script type="text/javascript">
          $("#staticBackdrop").modal();
      </script> 

          <script>
      var audio = new Audio('son/fin.mp3');
      audio.play();
    </script>
      <?php
      session_destroy();
  }
}



if(isset($_POST['button5'])){
  switche($labyrintheR,$_SESSION['ligne'],$_SESSION['colonne'],"rouge",$longueur,$largeur);
  }
  if(isset($_POST['button6'])){
    switche($labyrintheB,$_SESSION['ligne'],$_SESSION['colonne'],"bleu",$longueur,$largeur);
  }
  
if(isset($_SESSION['set2'])){
  $tmp=$_SESSION['labyrinthe'];
  $tmp[$_SESSION['ligne']][$_SESSION['colonne']] = 3;
  affichage($tmp,$longueur,$largeur,$_SESSION['color']);
  unset($_SESSION['set2']);
}

if(isset($_SESSION['set'])){
  unset($_SESSION['set']);
  $_SESSION['set2'] = 1;
}

?>

<p style="color:white;font-size: 200%;"><?php echo $_SESSION['countDeplacement']; ?> moves</p>

<form  method="post" style="padding-top:30px; position:absolute;left: 30%;">
  <input class="direction" type="submit" name="button1" value="Top">
  </br>
  <input class="direction" type="submit" name="button2" value="Left">
  <input class="direction" style="border:none;margin-right: 0;margin-left:0;">
  <input class="direction" type="submit" name="button3" value="Right">
  </br>
  <input class="direction" type="submit" name="button4" value="Bottom">
</form>

<form  method="post">
<input type="submit" name="button5" class="case" style="background-color: #fe3547;color: #fe3547;border : 0;position: absolute;bottom: 32%;right: 37%;">
  <input type="submit" name="button6" class="case" style="background-color: #228be6;color: #228be6;border : 0;position: absolute;bottom: 32%;right: 42%;">
</form>

<p style="position:absolute;bottom: 36%;right: 38%;font-size: 150%;">Change color</p>


<p id="target" style="color:#171719;">a</p>

<script type="text/javascript">
  var element = document.getElementById("target");

  element.scrollIntoView();
</script>

  </center>
</body>
</html>