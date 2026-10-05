<?php
$c = file_get_contents("/var/www/html/dvwa/includes/dvwaPage.inc.php");
$pos = strpos($c, "SERVER_NAME");
if ($pos !== false) {
    echo substr($c, $pos-10, 120) . "\n";
}