<?php
session_start();
session_unset('id_session');
session_destroy();

header('Location: signin.php');
?>