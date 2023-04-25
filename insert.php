<?php

include 'connection.php';

$postData = $_POST;

if(!empty($postData)){
    $firstname = $postData['name2'];
    $emailname = $postData['email2'];
    $mobilenumber = $postData['mobile2'];

      $sql = "INSERT INTO register(name, email, mobile) VALUES ('$firstname','$emailname','$mobilenumber')";
      if ($conn->query($sql)) 
      {
        echo "Data Inserted Successfully";
      } 
      else{echo "data not inserted";
    }
      
}

?>