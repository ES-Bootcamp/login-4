<?php session_start();
require '../../config/database.php';
require '../Exceptions/errors.php';
// handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $old = [];

    // validate
    if (!$username) {
        add_error_to_session('username', 'you must provide a username');
    } else {
        if(!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
            $old['username'] = $username;
            add_error_to_session('username', 'Invalid username!');
        }
    }
    if(!empty($_SESSION['errors'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // login the user to its account
        $query = 'SELECT * FROM users WHERE username="'. $username.'" LIMIT 1';
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)) {
            $user = mysqli_fetch_assoc($result);
            if(password_verify($password, $user['password'])) {
                $_SESSION['current_user'] = $user['id'];
                header('Location: ../../profile.php');
            } else {
                add_error_to_session('password', 'Password incorrect!');
            }
        } else {
            $old['username'] = $username;
            add_error_to_session('username', 'User not found');
        }
        if(!empty($_SESSION['errors'])) {
            $_SESSION['old'] = $old;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
