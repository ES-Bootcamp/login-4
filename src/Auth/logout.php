<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    unset($_SESSION['current_user']);
    session_destroy();
    header('Location: ../../index.php');
}