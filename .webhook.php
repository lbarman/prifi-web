<?php
$PATH = "/var/www/prifi-web";

shell_exec("cd $PATH; git reset --hard; git clean -fd");
shell_exec("cd $PATH; git pull");
?>