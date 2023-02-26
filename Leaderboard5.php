<!DOCTYPE html>
<html>
<head>
    <?php include 'headers.html'?>
</head>
<body style="background: #171719;color: white;">


    <?php    
        include 'navbar.html'; 
        
        include 'connexion.php';
        
        $requete = "SELECT  Username, Score FROM leaderboard WHERE Levels=5 ORDER BY Score";
        $result = mysqli_query($link,$requete);
            /*if ( $result == FALSE ) {             
                echo "<p>Erreur d'exécution de la requete</p>" ;
                echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
                die();         
            }     
            else {              
                echo "<p>SELECT a retourné " . mysqli_num_rows($result) . " lignes</p>" ;
            }*/
           
    ?>
    <br/>
    <br/>
    <table align="center" class="table table-striped table-dark" style="width:90%;background-color: black;">  
        <thead>       
                <tr>             
                    <th class="col-3">Rank</th>             
                    <th class="col-3">Username</th>
                    <th class="col-3">Score</th>        
                </tr>
        </thead>
        <tbody>
            <?php
            $compteur=1;
            /* Extraction des résultats de la requete SELECT */     
            if  ( mysqli_num_rows($result)  > 0)  {             
                while ($row = mysqli_fetch_assoc($result) and $compteur<11) {                     
                    /* constrution des lignes dynamiquement */   
                    if($row["Score"]>0){
                        echo "<tr>";
                        echo "<td >" . $compteur . "</td>"  ;                   
                        echo "<td>" . $row["Username"] . "</td>" ;                     
                        echo "<td>" . $row["Score"] . "</td>" ;   
                        $compteur=$compteur+1;    
                    }                  
                        
                }           
            }     
            else {             
                echo "<tr>" ;             
                echo "<td colspan='2'>La requête ne renvoie pas de résultat !</td>" ;
                echo "</tr>";         
            } 

        ?>
        </tbody>
    </table>  <!-- fin du tableau -->

</body>
</html>