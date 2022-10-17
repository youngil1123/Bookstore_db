<?php
session_start();
$userID = $_SESSION['userID'];
echo $userID;
?>