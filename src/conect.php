<?php
  $servername = "localhost";
  $username = "u1191252_default";
  $password = "iG!e0YN4";
  $dbname= "u1191252_default";
  $connect = mysqli_connect($servername, $username, $password, $dbname);
 
 if (!$connect) {
   die("Ошибка в: " . mysqli_connect_error());
  }
?>