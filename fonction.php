<?php

session_start();


function affichage($labyrinthe, $L, $l, $color){
      for ($i = 0; $i < $L; $i++) {
                for ($j = 0; $j < $l; $j++) {
                        if($labyrinthe[$i][$j] == 3){
                             $labyrinthe[$i][$j] = '<img class="animationperso" style="margin: 2px 0px 2px 0px;" src="images/personnage.png"/>';;
                             echo $labyrinthe[$i][$j]." ";
                        }
                    else if($labyrinthe[$i][$j] == 5){
                        $labyrinthe[$i][$j] = '<img class="case" src="images/arrivee.png"/>';;
                        echo $labyrinthe[$i][$j]." ";
                    }
                        else if($labyrinthe[$i][$j] == 0){
                          if($color == 'rouge'){
                             $labyrinthe[$i][$j] = '<img class="case" src="images/caserouge.png"/>';;
                             echo $labyrinthe[$i][$j]." ";
                          }
                          else if($color == 'bleu'){
                            $labyrinthe[$i][$j] = '<img class="case" src="images/casebleue.png" />';
                            echo $labyrinthe[$i][$j]." ";
                          }
                          else if($color == 'vert'){
                            $labyrinthe[$i][$j] = '<img class="case" src="images/caseverte.png" />';
                            echo $labyrinthe[$i][$j]." ";
                          }
                          else if($color == 'jaune'){
                            $labyrinthe[$i][$j] = '<img class="case" src="images/casejaune.png" />';
                            echo $labyrinthe[$i][$j]." ";
                          }
                        }
                      else if($labyrinthe[$i][$j] == 1){
                            $labyrinthe[$i][$j] = '<img class="case" style="border:1px solid white;" src="images/mur.png" /></div>';;
                           echo $labyrinthe[$i][$j]." ";
                      }
                  }
              echo "</br>";
      }
    }

  function deplacement($labyrinthe,$longueur,$largeur,$color,$ligne,$colonne){
    $perso = 3;
    if(!(isset($_SESSION["count"]))){
      $count = 0;
    }
    else{$count = $_SESSION['count'];}

    if ($count == 0){
        $_SESSION['countDeplacement']=0;
        $_SESSION["ligne"] = $ligne;
        $_SESSION["colonne"] = $colonne;
        $labyrinthe[$ligne][$colonne] = $perso;
        $count++;
        $_SESSION["count"] = $count;
    }

     if(isset($_POST['button1'])){
         $colonne = $_SESSION["colonne"];
         $ligne = $_SESSION["ligne"];
        if($labyrinthe[$ligne][$colonne] == 1){
            $labyrinthe[$ligne][$colonne] = 1;
        }
        else{
            $labyrinthe[$ligne][$colonne] = 0;
        }
    
        if($labyrinthe[$ligne - 1][$colonne] != 1){
            $_SESSION['countDeplacement']++;
            $_SESSION["ligne"] = $ligne - 1;
            if($labyrinthe[$ligne - 1][$colonne] == 5){
              $_SESSION["arrivee"] = 1;
              //session_destroy();
            }
            else{
              $labyrinthe[$ligne - 1][$colonne] = $perso;
              ?><script>
              var audio = new Audio('son/mouvement.mp3');
              audio.play();
              </script>
              <?php
              echo affichage($labyrinthe, $longueur, $largeur,$color);
            } 
        }
        else{
            $labyrinthe[$ligne][$colonne] = $perso;
            ?><script>
              var audio = new Audio('son/interact.mp3');
              audio.play();
              </script>
              <?php
            echo affichage($labyrinthe, $longueur, $largeur,$color);
         }
        }
    
      if(isset($_POST['button2'])){
          $colonne = $_SESSION["colonne"];
          $ligne = $_SESSION["ligne"];
          if($labyrinthe[$ligne][$colonne] == 1){
            $labyrinthe[$ligne][$colonne] = 1;
          }
          else{
            $labyrinthe[$ligne][$colonne] = 0;
          }

          if($labyrinthe[$ligne][$colonne - 1] != 1){
            $_SESSION['countDeplacement']++;
            $_SESSION["colonne"] = $colonne - 1;
              if($labyrinthe[$ligne][$colonne - 1] == 5){
                $_SESSION["arrivee"] = 1;
                //session_destroy();
              }
              else{
                $labyrinthe[$ligne][$colonne - 1] = $perso;
                ?><script>
                var audio = new Audio('son/mouvement.mp3');
                audio.play();
                </script>
                <?php
                echo affichage($labyrinthe, $longueur, $largeur,$color);
              }
          }
          else{
              $labyrinthe[$ligne][$colonne] = $perso;
              ?><script>
              var audio = new Audio('son/interact.mp3');
              audio.play();
              </script>
              <?php
              echo affichage($labyrinthe, $longueur, $largeur,$color);
          }   
        }
      if(isset($_POST['button3'])){
          $colonne = $_SESSION["colonne"];
          $ligne = $_SESSION["ligne"];
         if($labyrinthe[$ligne][$colonne] == 1){
              $labyrinthe[$ligne][$colonne] = 1;
            }
         else{
              $labyrinthe[$ligne][$colonne] = 0;
            }
    
          if($labyrinthe[$ligne][$colonne + 1] != 1){
            $_SESSION['countDeplacement']++;
            $_SESSION["colonne"] = $colonne + 1;
             if($labyrinthe[$ligne][$colonne + 1] == 5){
              $_SESSION["arrivee"] = 1;
              //session_destroy();
             } 
              else{
                $labyrinthe[$ligne][$colonne + 1] = $perso;
                ?><script>
                var audio = new Audio('son/mouvement.mp3');
                audio.play();
                </script>
                <?php
                echo affichage($labyrinthe, $longueur, $largeur,$color);
             }
            }
          else{
            $labyrinthe[$ligne][$colonne] = $perso;
            ?><script>
              var audio = new Audio('son/interact.mp3');
              audio.play();
              </script>
              <?php
            echo affichage($labyrinthe, $longueur, $largeur,$color);
         } 
        } 
    
      if(isset($_POST['button4'])){
          $colonne = $_SESSION["colonne"];
          $ligne = $_SESSION["ligne"];
          if($labyrinthe[$ligne][$colonne] == 1){
              $labyrinthe[$ligne][$colonne] = 1;
            }
          else{
              $labyrinthe[$ligne][$colonne] = 0;
            }
    
          if($labyrinthe[$ligne + 1][$colonne] != 1){
            $_SESSION['countDeplacement']++;
            $_SESSION["ligne"] = $ligne + 1;
            if($labyrinthe[$ligne + 1][$colonne] == 5){
              $_SESSION["arrivee"] = 1;
              //session_destroy();
            }  
            else{
              $labyrinthe[$ligne + 1][$colonne] = $perso;
              ?><script>
              var audio = new Audio('son/mouvement.mp3');
              audio.play();
              </script>
              <?php
              echo affichage($labyrinthe, $longueur, $largeur,$color);
            }
          }
          else{
              $labyrinthe[$ligne][$colonne] = $perso;
              ?><script>
              var audio = new Audio('son/interact.mp3');
              audio.play();
              </script>
              <?php
              echo affichage($labyrinthe, $longueur, $largeur,$color);
          }
        }
    }


function switche($nextLabyrinth,$PosX,$PosY, $color,$longueur,$largeur){
    $_SESSION['countDeplacement']++;
    if ($nextLabyrinth[$PosX][$PosY] != 1){
        $_SESSION['labyrinthe']=$nextLabyrinth;
        $_SESSION['color']=$color;
        $nextLabyrinth[$PosX][$PosY]= 3;
        affichage($nextLabyrinth,$longueur,$largeur,$color); //Affiche le perso
    }
    else{
      affichage($nextLabyrinth,$longueur,$largeur,$color); //n'affiche pas 
    }
}



function addscore($score,$level){
  include 'connexion.php';
  $request="SELECT ID FROM leaderboard";
  $result=mysqli_query($link,$request);
  if($result == FALSE){
    echo "<p> Erreur d'exécution de la requete </p>";
    echo mysqli_errno($link). ": ".mysqli_error($link). "\n";
    die();
  }
  while ($row = mysqli_fetch_assoc($result)){
      $id=$row["ID"]+1;
  }
  $id--;
  
  $request="SELECT Username FROM leaderboard";
  $result=mysqli_query($link,$request);
  while ($row = mysqli_fetch_assoc($result)){
    $name=$row["Username"];
}
  $update = "UPDATE leaderboard SET Score = '".$score."' WHERE ID='$id' AND Levels = $level";
  $result=mysqli_query($link,$update);
  if($result == FALSE){
    echo "<p> Erreur d'exécution de la requete </p>";
    echo mysqli_errno($link). ": ".mysqli_error($link). "\n";
    die();
  }
}

//session_destroy();

?>