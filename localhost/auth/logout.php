<?php

session_start();
unset($_SESSION['logged_user']);
unset($_SESSION['token']);
header("Location: http://localhost/");


?>