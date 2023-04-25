

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
  
</head>
<body>
<script>
   $(document).ready(function() {
 
 $("#submit").click(function() {

var name1 = $("#name1").val();
var email1 = $("#email1").val();
var mobile1 = $("#mobile1").val();


if(name1==''||email1==''||mobile1=='') {
  alert("Please fill all fields.");
  return false;
}
else{
$.ajax({
  type: "POST",
  url: "insert.php",
  data:{ name2:name1,
        email2:email1,
        mobile2:mobile1
       
  },
     
  
 
  success: function(data) {
      alert("Sesscess");
  },
  error: function(xhr, status, error) {
      console.error(xhr);
  }

 
 
});
}
});

});

</script>





   <script>
       function clearErrors()
       {

          errors = document.getElementsByClassName('formerror');
           for(let item of errors)
          {
           item.innerHTML = "";
           }
        }
       function seterror(id, error1)
       {
          element = document.getElementById(id);
          element.getElementsByClassName('formerror')[0].innerHTML = error1;
        }

        function validateForm()
        {
           var returnval = true;
           clearErrors();
           var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
           var namreg  = /^[A-Z]/;
           var regmm='^([0|+[0-9]{1,5})?([7-9][0-9]{9})$';
           var name = document.forms['myForm']["name"].value;
           if (name==null || name=="")
           {
              seterror("name", "*Name Can't Empty");
               returnval = false;
           }
            else if (!name.match(namreg))
            {
              seterror("name", "*First letter  Captial");
              returnval = false;
            }
            var email = document.forms['myForm']["email"].value;
            if (email==null || email=="")
            {
              seterror("email", "*Email can't Empty");
              returnval = false;
            }
            else if(!email.match(validRegex))
            {
             seterror("email", "*Please Enter valid Email Id");
             returnval = false;
            }
            var phone = document.forms['myForm']["mobile"].value;
            if (phone.length != 10)
            {
              seterror("phone", "*Phone number should be of 10 digits");
              returnval = false;
            }
            else if(!phone.match(regmm))
            {
              seterror("phone", "* Character can't Accpected");
              returnval = false;
            }
            return returnval;
        }
        </script>
    


    <h1>Employee registion from!</h1>
    <form id="frmrecord" aciton ="insert.php" name="myForm"  method="post" onclick =" validateForm()" enctype="multipart/form-data" >
        <div class="formdesign" id="name">
            Name: <input type="text" name="name" id="name1"><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="email">
              Email: <input type="text" name="email" id="email1"><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="phone">
            Mobile: <input type="text" name="mobile" id="mobile1"><b><span class="formerror"></span></b>
        </div>

        <label>Please Select Zip File</label>  
                     <input type="file" name="zip_file" />  

        

        <input class="but" type="button" name="submit" value="Upload" id="submit"  >
        <!-- <button type="submit" name="submit"  id="submit">Submit</button> -->
    </form>
</body>
</html>