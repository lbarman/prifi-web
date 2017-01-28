<?php
$PATH = "/var/www/prifi-web";
$SECRET = "nice_try";

file_put_contents('filename.txt', print_r($_POST, true));

shell_exec("cd $PATH; git reset --hard; git clean -fd");
shell_exec("cd $PATH; git pull");
?>