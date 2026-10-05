<?php
$c = file_get_contents("/var/www/html/dvwa/includes/dvwaPage.inc.php");
$c = str_replace("' . ['SERVER_NAME'] . '</em>';", "' . \$_SERVER['SERVER_NAME'] . '</em>';", $c);
file_put_contents("/var/www/html/dvwa/includes/dvwaPage.inc.php", $c);
echo "Done\n";