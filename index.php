<?php
function console_log($output, $with_script_tags = true) {
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
  if ($with_script_tags) {
      $js_code = '<script>'.$js_code.'</script>';
  }
  echo $js_code;
}

  $lastName = "";
  $firstName = "";
  $email = "";
  $gender = "";
  $country = "";
  $subject = "";
  $message = "";

if(isset($_POST)){
  if(isset($_POST['lastName'])) $lastName = $_POST['lastName'];
  if(isset($_POST['firstName'])) $firstName = $_POST['firstName'];
  if(isset($_POST['email']))$email = $_POST['email'];
  if(isset($_POST['gender']))$gender = $_POST['gender'];
  if(isset($_POST['country']))$country = $_POST['country'];
  if(isset($_POST['subject']))$subject = $_POST['subject'];
  if(isset($_POST['message']))$message = $_POST['message'];
}

console_log("test PHP console log");
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Hackers Poulette form</title>
    <link rel="stylesheet" href="./css/honeypot.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="./css/hackers.css" type="text/css" charset="utf-8" />
    <script>
     console.log("test console");
    </script> 
</head>

<style>
div {
    margin-left: auto;
    margin-right: auto;
    width: 60%;
    border-radius: 10px;
    background-color: #f2f2f2;
    padding: 10px;
}

div.center{
    text-align: center;
}

div.img{
  max-width:70%; 
  height:auto
  padding: 0px;
  border-radius: 0px;
  text-align: center;
  background-color: red;
}

input[type=text],select {
    width: 70%;
    padding: 5px 10px;
    margin: 2px 0;
    display: inline;
    border: 2px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

 input[type=radio] {
    display: inline;
    width: 4%;
    background-color: #4CAF50;
    color: white;
    margin: 4px 0;
    border-radius: 4px;
    cursor: pointer;
  }

 input[type=radio]:hover {
    border: 0 none;
    background: blue;
  }

input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
input[type=submit]:hover {
    background-color: #45a049;
  }
</style>

<body>
    <div class="img"><img src="./img/hackers-poulette-logo.png"></img></div>
    <br><div><form id='submitForm' method='POST' action='formValidation.php' onsubmit="return toSubmit()" >

    <label for='lastName'>Lastname</label>
    <input type='text' id='lastName' name='lastName' required value = '<?php echo $lastName ?>'>

    <br><br><label for='firstName'>First name</label>
    <input type='text' id='firstName' name='firstName' required value = '<?php echo $firstName ?>'>

    <br><br><label for='Email'>Email</label>
    <input type='email' id='email' name='email' required value = '<?php echo $email ?>'>

    <br><br><label for='gender'>Gender</label>

    <input type='radio' name='gender' value='M' required <?php echo ($gender == 'M')? 'checked':'' ?> >Man
    <input type='radio' name='gender' value='F' required <?php echo ($gender == 'F')? 'checked':'' ?> >Woman

    <br><br><label for='country'>Country</label>
        <input type='text' id='country' name='country' required  value = '<?php echo $country ?>'>

    <br><br><label for='subject'>Subject</label >
    <select id='subject' name='subject'>
    <option value='other' <?php echo ($subject == 'other')? 'selected':'' ?> >Other</option>
    <option value='command' <?php echo ($subject == 'command')? 'selected':'' ?> >Command</option>
    <option value='claim' <?php echo ($subject == 'claim')? 'selected':'' ?> >Claim</option>
    </select>
    <br><br><label for='message'>Message</label>
        <br><textarea rows='10' cols='100' id='message' name='message' required ><?php echo $message ?> </textarea>

    <input id="website" name="website" type="text" value=""/>

    <br><br><div class="center"><input type="submit" name="submit" value="Send message"></div></form></div>

    <script>
        console.log("document.getElementById('website').value = " + document.getElementById("website").value );
        console.log("document.getElementById('website').value.length = " + document.getElementById("website").value.length );
        // window.onload = function(){
        //   document.getElementById("submitForm").addEventListener('submit', event => {
        //     if (document.getElementById("website").value.length != 0) {
                  
        //           //event.preventDefault();
        //           alert("honey pot filled !!");
        //           return false;
        //         } 
            
        //   });
        // }

        function toSubmit(){
            if (document.getElementById("website").value.length != 0) {
                  alert("honey pot filled !!");
                  return false;
                } 
        }
    </script>   
</body></html>
<?php
?>