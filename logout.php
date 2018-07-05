<?php
session_start();
session_destroy(); 
 header("Location:index.html?status=logged out");
?>