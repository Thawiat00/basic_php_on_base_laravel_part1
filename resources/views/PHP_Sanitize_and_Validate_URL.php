<?php
$url = "https://www.w3schools.com";

// Remove all illegal characters from a url
$url = filter_var($url, FILTER_SANITIZE_URL);

// Validate url
if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
  echo("$url is a valid URL");
} else {
  echo("$url is not a valid URL");
}
?>


<?php
echo'<br> <br>';
echo
'Sanitize and Validate a URL <br>

The following example uses the filter_var() function to first remove all illegal characters from a URL, then check if $url is a valid URL:


';
?>