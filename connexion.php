<?php
$link   = mysqli_connect("127.0.0.1","root","", "colormaze") ;
/*if ($link == false) {             
    echo "Erreur de connexion : " .  mysqli_connect_errno()  ;
    die();
}       
else {             
    echo "<p>connexion r&eacute;ussie</p>" ;
}
*/
if (!mysqli_set_charset($link,"utf8")){
    //set utf8 pour tout caractère de la base de données
    printf("Error loading character set utf8: %s\n",mysqli_error($link));
    exit();
}
/*else {
    printf("Current character set: %s\n",mysqli_character_set_name($link));
}*/