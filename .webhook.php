<?php
$PATH = "/var/www/prifi-web";
$SECRET = "nice_try";

shell_exec("cd $PATH; git reset --hard; git clean -fd");
shell_exec("cd $PATH; git pull");
?>