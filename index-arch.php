<?php
function console_log($output, $with_script_tags = true) {
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
  if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
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
  if(isset($_POST['firstName']))$firstName = $_POST['firstName'];
  if(isset($_POST['email']))$email = $_POST['email'];
  if(isset($_POST['gender']))$gender = $_POST['gender'];
  if(isset($_POST['country']))$country = $_POST['country'];
  if(isset($_POST['subject']))$subject = $_POST['subject'];
  if(isset($_POST['message']))$message = $_POST['message'];
}
// echo "<pre>";
// print_r($_POST);// to 
// echo "</pre>";

echo '<!DOCTYPE html>
<html lang="en">
<head><title>Hackers Poulette form</title>
    <link rel="stylesheet" href="./web fonts/bellota_regular_macroman/stylesheet.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="./css/honeypot.css" type="text/css" charset="utf-8" />
    <script>
    console.log("$(input#website).val() = "+ $("input#website").val());
    $("form").submit(function(){    
            if ($("input#website").val().length != 0) {
                return false;
            } 
    });
    </script>
</head>';
echo '<style>

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
  
</style>';
echo'<body>';
echo'<div class="img"><img src="./img/hackers-poulette-logo.png"></img></div>';
echo "<br><div><form method='POST' action='formValidation.php' >

<label for='lastName'>Lastname</label>
<input type='text' id='lastName' name='lastName' required value = $lastName>

<br><br><label for='firstName'>First name</label>
<input type='text' id='firstName' name='firstName' required value = $firstName>

<br><br><label for='Email'>Email</label>
<input type='email' id='email' name='email' required value = $email >

<br><br><label for='gender'>Gender</label>";

echo "<input type='radio' name='gender' value='M' required ".(($gender == 'M')? 'checked':'').">Man";
echo "<input type='radio' name='gender' value='F' required ".(($gender == 'F')? 'checked':'').">Woman";

echo "<br><br><label for='country'>Country</label>
    <input type='text' id='country' name='country' required  value = $country>

<br><br><label for='subject'>Subject</label >";
echo "<select id='subject' name='subject'>";
echo "<option value='other' ".(($subject == 'other')? selected:'').">Other</option>";
echo "<option value='command' ".(($subject == 'command')? selected:'').">Command</option>";
echo "<option value='claim' ".(($subject == 'claim')? selected:'').">Claim</option>";
echo "</select>"; 
echo "<br><br><label for='message'>Message</label>
    <br><textarea rows='10' cols='100' id='message' name='message' required >$message</textarea>";

echo '<input id="website" name="website" type="text" value="hack"/>';

echo'<br><br><div class="center"><input type="submit" name="submit" value="Send message"></div></form></div>';
echo '</body></html>';  
?>