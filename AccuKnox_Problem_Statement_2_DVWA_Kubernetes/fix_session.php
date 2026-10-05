<?php
$content = file_get_contents("/var/www/html/dvwa/includes/dvwaPage.inc.php");
$search = '"domain" => $_SERVER';
$replace = '"domain" => ""';
$content = str_replace($search, $replace, $content);
// Also handle the already modified version
$content = str_replace("$_SERVER['''']", '""', $content);
file_put_contents("/var/www/html/dvwa/includes/dvwaPage.inc.php", $content);
echo "Done\n";