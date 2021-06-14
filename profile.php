<?php 
session_start();

require 'config/database.php';

if(isset($_SESSION['current_user'])) {
    $query = 'SELECT * FROM users WHERE id="' . $_SESSION['current_user'].'"';
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result)) {
        print_r(mysqli_fetch_assoc($result));
    }
}else {
    header('Location: index.php');
}
?>

<form action="src/Auth/logout.php" method="POST">
    <button type="submit"> Logout </button>
</form>