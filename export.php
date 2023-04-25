<?php  
  include 'connection.php';
     if (isset($_GET['id']))
   {
     $user_id = $_GET['id'];
      $output = fopen("data.csv", "w");  
      fputcsv($output, array('ID', 'Name', 'Email', 'Mobile'));  
      $query = "SELECT id, name, email, mobile  from register where id= $user_id" ;  
      $result = mysqli_query($conn, $query); 
      while($row = mysqli_fetch_assoc($result))  
      {  
        
       fputcsv($output, $row);  
      }
      fclose($output); 
      header('Location: data.csv');
   }
?>  