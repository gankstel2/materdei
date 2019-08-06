<?php
session_start();
session_destroy();
header("Location: materdei-backend/login.php");	
?>