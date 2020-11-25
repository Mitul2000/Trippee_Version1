<?php

$mysqli = new mysqli("localhost:8080", "root", "WoI34DVV72McuhuJ", "trippe");

if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

?>