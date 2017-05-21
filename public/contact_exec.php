<?php

  if(isset($_GET['name'])){
    if(isset($_GET['mail'])){
      if(isset($_GET['adress'])){
        if(isset($_GET['cp'])){
          if(isset($_GET['city'])){
              if(isset($_GET['message'])){
                $link=mysqli_connect('localhost','root','','zend') or die("error sql!".mysql_error());
                $resultat = 'INSERT INTO `contact` SET `name`="'.$_GET['name'].'",`mail`="'.$_GET['mail'].'",`adress`="'.$_GET['adress'].'",`cp`="'.$_GET['cp'].'",`city`="'.$_GET['city'].'",`message`="'.$_GET['message'].'"';
                mysqli_query($link,$resultat);
                echo'
                <h3>'.$_GET['name'].'</h3>
                <h4>'.$_GET['city'].' , '.$_GET['cp'].' , '.$_GET['adress'].' </h4>
                <span>'.$_GET['mail'].'</span>
                <p>'.$_GET['message'].'</p>
                ';
              }
              else{echo'error<br/>';}
          }
            else{echo 'error<br/>';}
        }
          else{echo 'error<br/>';}
      }
        else{echo 'error2<br/>';}
    }
    else{echo 'error<br/>';}
  }
  else{echo'bite';}

?>
