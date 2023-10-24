<?php 
// mengaktifkan session php
session_start();
session_destroy();
header("Location: index.php?pesan=ot");
?>