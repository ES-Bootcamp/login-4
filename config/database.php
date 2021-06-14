<?php
// connect using the prodcedural way (normal way)

$con = mysqli_connect('localhost', 'root', '', 'esbootcamp4');
if(mysqli_connect_errno()) {
    throw new Exception(mysqli_connect_error());
}