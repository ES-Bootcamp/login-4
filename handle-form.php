<?php

session_start();

require 'errors.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $errors = [];
    if (!$username) {
        add_error_to_session('username', 'you must provide a username');
    } elseif ($username != 'ilyes') {
        add_error_to_session('username', 'User is not found');
    } else {
        if ($password != 'abcd1234') {
            add_error_to_session('password', 'Password incorrect');
        }
    }
    if(!empty($_SESSION)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // login the user to its account
    }
}
