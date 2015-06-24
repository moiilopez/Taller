<?php
session_start();

if (!isset($_SESSION['autenticar']) or $_SESSION['autenticar'] == FALSE)
    {
       header('location: ../View/Login.php');
    }

