<?php

require_once ('./functions.php');

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
  if(isset($_POST['email'])) $email = $_POST['email'];
  if(isset($_POST['gender'])) $gender = $_POST['gender'];
  if(isset($_POST['country'])) $country = $_POST['country'];
  if(isset($_POST['subject'])) $subject = $_POST['subject'];
  if(isset($_POST['message'])) $message = $_POST['message'];
}

//echoAndConsole_log_JS("country:".$country );

?>
<!DOCTYPE html>
<html lang="en">
<head><title>Hackers Poulette form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
  
    <link rel="stylesheet" href="./css/honeypot.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="./css/hackers.css" type="text/css" charset="utf-8" />
</head>

<body>
    <div class="container-sm logo"><img role="image" src="./img/hackers-poulette-logo.png"></img></div>
    <br><div class="container-sm"><form role="form" id='submitForm' method='POST' action='formValidation.php' onsubmit="return toSubmit()" >

    <label id="lastName-label" for='lastName'>LastName</label>
    <input aria-required="true" aria-labelledby="lastName-label" role="lastName" type='text' 
    id='lastName' name='lastName' required value = '<?php echo $lastName ?>' onblur=testName('lastName','lastName-error-label')>
    <label id="lastName-error-label" class="hidden text-danger">Error : only letters & "-"</label>

    <br><label id="firstName-label" for='firstName'>First name</label>
    <input aria-required="true" aria-labelledby="firstName-label" role="firstName" type='text' 
    id='firstName' name='firstName' required value = '<?php echo $firstName ?>' onblur=testName('firstName','firstName-error-label')>
    <label id="firstName-error-label" class="hidden text-danger">Error : only letters & "-"</label>

    <br><label id="email-label" for='Email'>Email</label>
    <input aria-required="true" aria-labelledby="email-label" role="email" type='email' 
      id='email' name='email' required value = '<?php echo $email ?>' onblur=testEmail('email','email-error-label') >
     <label id="email-error-label" class="hidden text-danger">Error : incorrect email address"</label>

    <br><label id="gender-label" for='gender'>Gender</label>

    <input aria-required="true" aria-labelledby="gender-label" role="genderItem" type='radio' name='gender' value='M' required <?php echo ($gender == 'M')? 'checked':'' ?> >Man
    <input aria-required="true" aria-labelledby="gender-label" role="genderItem" type='radio' name='gender' value='F' required <?php echo ($gender == 'F')? 'checked':'' ?> >Woman

    <br>
	<!-- <label id="country-label" for='country'>Country</label> -->
	<?php require_once('./countries.php');?>
	
	<script>
    let country = "<?php echo $country; ?>"; // get back the country
	
    if (country != '') {
		console.log ("country="+country);
        document.getElementById('country').value = country;// select option
    }
	</script>

    <!-- <input aria-required="true" aria-labelledby="country-label" type='text' 
    id='country' name='country' required  value = '<?php echo $country ?>' onblur=testName('country','country-error-label') > -->
    <!-- <label id="country-error-label" class="hidden text-danger">Error : only letters & "-"</label> -->

    <br><label id="select-label" for='subject'>Subject</label >
    <select id='subject' aria-labelledby="select-label" aria-required="true" name='subject' >
    <option aria-current="true" role="subjectItem" value='other' <?php echo ($subject == 'other')? 'selected':'' ?> >Other</option>
    <option role="subjectItem" value='command' <?php echo ($subject == 'command')? 'selected':'' ?> >Command</option>
    <option role="subjectItem" value='claim' <?php echo ($subject == 'claim')? 'selected':'' ?> >Claim</option>
    </select>
    <br><label id="message-label" for='message'>Message</label>
    <br><div class="container-sm">
          <textarea aria-required="true" aria-labelledby="message-label" role="message"  
          id='message' name='message' required ><?php echo $message ?></textarea>
        </div> 
    
    <input id="website" name="website" type="text" value=""/><!-- honey pot-->

    <div class="center"><input role="submitButton" type="submit" name="submit" value="Send message"></div></form></div>

    <script>
        console.log("document.getElementById('website').value = " + document.getElementById("website").value );
        console.log("document.getElementById('website').value.length = " + document.getElementById("website").value.length );

        function toSubmit(){
            if (document.getElementById("website").value.length != 0) {
                  alert("honey pot filled !! = a robot has attempted to filled the form. \n\nRespond the following question to continue the form. \n\nAnd resubmit the form.");
                  if (confirm("Do you want to stop the execution of the form ?")) {//popup window to confirm a decision
                  } else {//by cancelling , the honey pot is empty and the re-submit of the form will be activated
                    document.getElementById("website").value="";
                  }
                  return false;
                } 
            
            if( window.getComputedStyle(document.getElementById("lastName-error-label")).visibility == "visible"){
              alert("Last name incorrect.");
              return false;
            }
            if( window.getComputedStyle(document.getElementById("firstName-error-label")).visibility == "visible"){
              alert("First name incorrect.");
              return false;                
            }
            if( window.getComputedStyle(document.getElementById("country-error-label")).visibility == "visible"){
              alert("Country incorrect.");
              return false;                
            }
        }

        function testName(objectId,labelId) {
          console.log("testText() : " + document.getElementById(objectId).value);
          
        //alert("The input value has changed. The new value is: " + val);
          if (document.getElementById(objectId).value.match(/[^a-zA-Z-]/)){ //if only letters & 1 "-" between letters then not error
            document.getElementById(labelId).style.visibility = "visible";
          }else{
            document.getElementById(labelId).style.visibility = "hidden";
          }
        }

        function testEmail(objectId,labelId){
          if (! document.getElementById(objectId).value.match(/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/)){
            document.getElementById(labelId).style.visibility = "visible";
          } else {
            document.getElementById(labelId).style.visibility = "hidden";
          }

        }
    </script>   
</body></html>
<?php
?>