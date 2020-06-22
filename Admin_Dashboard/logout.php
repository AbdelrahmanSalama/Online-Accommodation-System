<?php
// Start the session
session_start();
session_unset(); 
session_destroy(); 

header("location:../signin.php");