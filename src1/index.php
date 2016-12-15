<?php
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}

echo "welcome to server 1";
echo "<pre>";
var_dump($_SESSION);
