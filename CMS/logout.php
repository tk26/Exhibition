<?php
require 'session1.php';

session_destroy();
echo "<script>window.location='login.php'</script>";
?>