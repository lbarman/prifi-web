<?php
$PATH = "/var/www/prifi-web";
$SECRET = "nice_try";

var_dump($_POST);

shell_exec("cd $PATH; git reset --hard; git clean -fd");
shell_exec("cd $PATH; git pull");
?>