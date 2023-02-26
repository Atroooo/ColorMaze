<!DOCTYPE html>
<html>
<head>
  <?php include 'headers.html';
  		include("fonction.php");       
?>

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
    window.location.href = "niv_cree_play.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
}

</script>

</head>

  <center>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="position : absolute;left:-7%;color: black;">
  <div class="modal-dialog">
    <div class="modal-content" style="width : 150%;">
      <div class="modal-header">
        <h5 class="modal-title" style="text-align:center;">YOU WON</h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="index.php">HOME</a></button>
      </div>
    </div>
  </div>
</div>

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

if($a==1){
  $_POST['button1']=1;
  $_SESSION['set']=1;
?>
<script>
  a = "0"
  b = "0"
  c = "0"
  d = "0"
  window.location.href = "niv_cree_play.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
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
  window.location.href = "niv_cree_play.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
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
  window.location.href = "niv_cree_play.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
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
  window.location.href = "niv_cree_play.php?a=" + a + "&b=" + b + "&c=" + c + "&d=" + d
</script>
<?php
}

include("habi_laby.php");


if(!isset($_SESSION["count3"])){
  ?>  
  <script type="text/javascript">
      $("#debut").modal();
  </script> 
  <?php
  $_SESSION["count3"] = 1;
  $_SESSION["color"] = 'rouge';
  $tab_temp = $_SESSION['R'];
  $tab_temp[$_SESSION['perso_posY']][$_SESSION['perso_posX']] = 0;
  $_SESSION['labyrinthe'] = $tab_temp;
  $_SESSION['arrivee'] = 0;
  affichage($_SESSION['R'],$_SESSION['taille'],$_SESSION['taille'],'rouge');
}


deplacement($_SESSION['labyrinthe'],$_SESSION['taille'],$_SESSION['taille'],$_SESSION['color'],$_SESSION['perso_posY'],$_SESSION['perso_posX'],$a,$b,$c,$d);

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
  switche($_SESSION['R'],$_SESSION['ligne'],$_SESSION['colonne'],"rouge",$_SESSION['taille'],$_SESSION['taille']);
    ?>
  <script>
    var audio = new Audio('son/switch.mp3');
    audio.play();
  </script>
    <?php
  }
  if(isset($_POST['button6'])){
    switche($_SESSION['B'],$_SESSION['ligne'],$_SESSION['colonne'],"bleu",$_SESSION['taille'],$_SESSION['taille']);
      ?>
  <script>
    var audio = new Audio('son/switch.mp3');
    audio.play();
  </script>
    <?php
  }
  if(isset($_POST['button7'])){
    switche($_SESSION['V'],$_SESSION['ligne'],$_SESSION['colonne'],"vert",$_SESSION['taille'],$_SESSION['taille']);
      ?>
  <script>
    var audio = new Audio('son/switch.mp3');
    audio.play();
  </script>
    <?php
  }
  if(isset($_POST['button8'])){
    switche($_SESSION['J'],$_SESSION['ligne'],$_SESSION['colonne'],"jaune",$_SESSION['taille'],$_SESSION['taille']);
      ?>
  <script>
    var audio = new Audio('son/switch.mp3');
    audio.play();
  </script>
    <?php
  }


if(isset($_SESSION['set2'])){
  $tmp=$_SESSION['labyrinthe'];
  $tmp[$_SESSION['ligne']][$_SESSION['colonne']] = 3;
  affichage($tmp,$_SESSION['taille'],$_SESSION['taille'],$_SESSION['color']);
  unset($_SESSION['set2']);
}

if(isset($_SESSION['set'])){
  unset($_SESSION['set']);
  $_SESSION['set2'] = 1;
}

?>

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
  <input type="submit" name="button5" class="case" style="background-color: #fe3547;color: #fe3547;border : 0;position: absolute;top: 80%;right: 28%;">
  <input type="submit" name="button6" class="case" style="background-color: #228be6;color: #228be6;border : 0;position: absolute;top: 80%;right: 33%;">
  <input type="submit" name="button7" class="case" style="background-color: #5bdb31;color: #5bdb31;border : 0;position: absolute;top: 80%;right: 43%;">
  <input type="submit" name="button8" class="case" style="background-color: #f4d20e;color: #f4d20e;border : 0;position: absolute;top: 80%;right: 38%;">
</form>

<p style="position:absolute;top: 75%;right: 34%;font-size: 150%;">Change color</p>

<p id="target" style="color:#171719;">a</p>

<script type="text/javascript">
  var element = document.getElementById("target");

  element.scrollIntoView();
</script>
  </center>
</body>
</html>

