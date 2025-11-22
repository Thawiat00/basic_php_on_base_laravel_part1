<?php
$email = "john.doe@example.com";

// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address");
}

?>



<?php

echo '<br> <br>'  ;

echo '
Sanitize and Validate an Email Address <br>
The following example uses the filter_var()  <br>
function to first remove all illegal characters from the $email variable, <br>
then check if it is a valid email address: <br>
';

?>