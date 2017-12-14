<?php

  $conn = new mysqli(null,'root','','mysql',null,'/cloudsql/project:region:deployment-name-mysql-master');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 echo "Connected successfully"."</br>";


?>