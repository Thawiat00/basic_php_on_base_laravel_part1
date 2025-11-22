<?php
$url = "https://www.w3schools.com";

if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
  echo("$url is a valid URL with a query string");
} else {
  echo("$url is not a valid URL with a query string");
}

echo '<br> <br>';

echo 'Validate URL - Must Contain QueryString <br>';
echo 'The following example uses the filter_var() function to check if the variable $url is a URL with a querystring:
 ';
?>


