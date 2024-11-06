<?php
session_start();

// Mendapatkan data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek jika username dan password sesuai (contoh statis)
if ($username == 'admin' && $password == 'admin123') {
    // Set session admin
    $_SESSION['admin'] = true;
    
    // Redirect ke halaman dashboard
    header('Location: dashboard.index');
    exit();
} else {
    // Jika login gagal, arahkan kembali ke halaman login
    header('Location: login.blade.php?error=1');
    exit();
}
?>
