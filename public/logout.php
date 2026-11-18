<?php
require_once __DIR__ . '/../src/Auth.php';

Auth::deconnecter();
header('Location: login.php');
exit;