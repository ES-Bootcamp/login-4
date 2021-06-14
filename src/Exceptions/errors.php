<?php 
function add_error_to_session(string $input, string $message) {
    $errors = [];
    $errors[$input][] = $message;
    $_SESSION['errors'] = $errors;
}