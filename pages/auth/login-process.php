<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

if (!isset($_POST['submit'])){
   header('location: auth-login.php');
   exit();
}

if ($username == ''){
   $_SESSION['msg-user'] = "Username tidak boleh kosong.";
}

if ($password == ''){
   $_SESSION['msg-pass'] = "Password tidak boleh kosong.";
}

if (isset($_SESSION['msg-user']) || isset($_SESSION['msg-pass'])){
   header('location: auth-login.php');
   exit();
}

$connect = mysqli_connect("localhost", "root", "phpmyadminpassword", "pbo");

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$query = mysqli_query($connect, $sql);
$numRow = mysqli_num_rows($query);
if($numRow == 0){
   $_SESSION['msg-global'] = "Data login tidak valid.";
   header('location: auth-login.php');
   exit();
}

// login
$_SESSION['login'] = true;
header('location: ../../?page=dashboard');