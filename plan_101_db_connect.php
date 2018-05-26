<?php
  $conn = new mysqli('localhost', 'root', '', 'plan_101');
  if ($conn->error) {
    echo "An error has occurred: " . $conn->error;
  }
?>
