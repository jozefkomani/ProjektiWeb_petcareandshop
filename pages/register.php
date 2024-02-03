<?php
require 'User.php'; 
$db = new mysqli('hostname', 'username', 'password', 'databasename'); 

$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   

    if ($user->register($username, $email, $password)) {
        echo "Regjistrimi u krye me sukses!";
    } else {
        echo "Ka ndodhur një gabim gjatë regjistrimit.";
    }
}
?>
