<?php
  $conn = new mysqli('localhost', 'root', '', 'plan_101');
  if ($conn->error) {
    echo "<div class='alert-secondary'>An error has occurred: " . $conn->error . "</div>";
  }
?>
