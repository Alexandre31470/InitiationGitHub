<?php
session_start();
header('Location: views/users/connexion.php?' . http_build_query($_GET));
exit();
