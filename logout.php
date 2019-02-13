<?php
ob_start();
include 'konekcija.inc';
if(isset($_SESSION['id_uloga']))
{
    unset($_SESSION['id_uloga']);
    unset($_SESSION['username']);
    @session_destroy();
    header('Location:index.php');
}