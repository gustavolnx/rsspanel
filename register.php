<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $users_file = 'users.json';
    $users_data = json_decode(file_get_contents($users_file), true);

    // Verificar se o usuário já existe
    foreach ($users_data['users'] as $user) {
        if ($user['username'] === $username) {
            echo "Erro: Nome de usuário já existe.";
            exit;
        }
    }

    // Adicionar novo usuário
    $users_data['users'][] = [
        'username' => $username,
        'password' => $password
    ];

    // Salvar os dados atualizados
    file_put_contents($users_file, json_encode($users_data, JSON_PRETTY_PRINT));

    // Criar arquivo JSON para as palavras bloqueadas do novo usuário
    if (!file_exists('users_data')) {
        mkdir('users_data', 0777, true);
    }
    file_put_contents("users_data/{$username}.json", json_encode(["blocked_words" => []]));

    echo "Usuário registrado com sucesso!";
}
?>
