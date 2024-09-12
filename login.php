<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users_file = 'users.json';
    $users_data = json_decode(file_get_contents($users_file), true);

    foreach ($users_data['users'] as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit;
        }
    }

    echo "Erro: Nome de usuário ou senha incorretos.";
}
?>
