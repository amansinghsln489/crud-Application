<?php
  include 'connection.php';
  if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "delete from register where id= $user_id";
    $result = $conn->query($sql);
    if ($result== true) {
      header("Location: read.php");
       
    }
  }
?>