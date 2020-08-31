<?php

echo '<!DOCTYPE html>
<html lang="en">
<head><title>Hackers Poulette form</title>
    <link rel="stylesheet" href="./web fonts/bellota_regular_macroman/stylesheet.css" type="text/css" charset="utf-8" />

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
echo '<br><div><form method="POST" action="formValidation.php" >

    <label for="lastName">Lastname</label>
    <input type="text" id="lastName" name="lastName" required >

    <br><br><label for="firstName">First name</label>
    <input type="text" id="firstName" name="firstName" required >

    <br><br><label for="Email">Email</label>
    <input type="email" id="email" name="email" required >

    <br><br><label for="gender">Gender</label>
    <input type="radio" name="gender" value="M" required >Man
    <input type="radio" name="gender" value="F" required >Woman

    <br><br><label for="country">Country</label>
    <input type="text" id="country" name="country" required >
    
    <br><br><label for="subject">Subject</label>
    <select id="subject" name="subject"  >
        <option value="other" selected>Other</option>
        <option value="command">Command</option>
        <option value="claim">Claim</option>
    </select> 
    <br><br><label for="message">Message</label>
    <br><textarea rows="10" cols="100" id="message" name="message" required></textarea>';
    
    echo'
    <br><br><div class="center"><input type="submit" name="submit" value="Send message"></div></form></div>';
    
    echo '</body></html>';  

?>