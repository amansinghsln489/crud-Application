<?php 

 include "connection.php";

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $user_id = $_POST['user_id'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        // $target_location = ($_FILES['images']['name']);
        $sql = "UPDATE `register` SET `name`='$name',`email`='$email',`mobile`='$mobile' WHERE `id`='$user_id'"; 
        $result = $conn->query($sql); 
        if ($result == TRUE) {
            
           
            echo "Data Updated Successfully";
            echo "<script>setTimeout(\"location.href = 'read.php';\",1500);</script>";
            

        }
        else{
            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {
    $user_id = $_GET['id']; 
    $sql = "SELECT * FROM register WHERE `id`='$user_id'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $email = $row['email'];

            $mobile = $row['mobile'];
            // $image = $row['img'];
           
            $id = $row['id'];

        } 
?>



     <html>
        <body>
    <script>
       function clearErrors(){

errors = document.getElementsByClassName('formerror');
for(let item of errors)
{
    item.innerHTML = "";
}


}
function seterror(id, error){

element = document.getElementById(id);
element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
var returnval = true;
clearErrors();
var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
var namreg =  /^[A-Z]/;
var regmm='^([0|+[0-9]{1,5})?([7-9][0-9]{9})$';

var name = document.forms['myForm']["name"].value;

 if (name==null || name==""){
    seterror("name", "*Name Can't Empty");
    returnval = false;
}
else if (!name.match(namreg)){
    seterror("name", "*First letter  Captial");
    returnval = false;
}
var email = document.forms['myForm']["email"].value;
if (email==null || email==""){
    seterror("email", "*Email can't Empty");
    returnval = false;
}
 else if(!email.match(validRegex)){
  seterror("email", "*Please Enter valid Email Id");
  returnval = false;
}

var phone = document.forms['myForm']["mobile"].value;
if (phone.length != 10){
    seterror("phone", "*Phone number should be of 10 digits");
    returnval = false;
}
else if(!phone.match(regmm)){
  seterror("phone", "* Character can't Accpected");
  returnval = false;
}


return returnval;
}

    </script>
  
  <h1>Employee Update from!</h1>
    <form aciton ="" name="myForm" onsubmit="return validateForm()" method="post">
        <div class="formdesign" id="name">
            Name: <input type="text" name="name" value="<?php echo $name;?>"> <b><span class="formerror"> </span></b>
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        </div>

        <div class="formdesign" id="email">
            Email: <input type="text" name="email" value="<?php echo $email;?>"><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="phone">
            Phone: <input type="text" name="mobile"value="<?php echo $mobile;?>"><b><span class="formerror"></span></b>
        </div>
        <div class="formdesign" id="pass">
            Profile Pic: <input type="file"
		       name="images[]"
		       multiple>  <b><span class="formerror"></span></b>
        </div>

        

        




        
        <input class="but" type="submit" name="update" value="Update">
     
    </form>
</body>
</html>
    <?php

    } 
    } 

?> 