<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit;
}

$username = $_SESSION['username'];
$filepath = "users_data/{$username}.json";

// Carregar dados do arquivo JSON
if (file_exists($filepath)) {
    $data = json_decode(file_get_contents($filepath), true);
} else {
    // Se o arquivo JSON não existir, criar um novo
    $data = ["default_words" => []];
    file_put_contents($filepath, json_encode($data));
}

// Adicionar nova palavra bloqueada
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_word'])) {
    $new_word = $_POST['new_word'];
    if (!in_array($new_word, $data['default_words'])) {
        $data['default_words'][] = $new_word;
        file_put_contents($filepath, json_encode($data));
    }
}

// Remover palavra bloqueada
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_word'])) {
    $remove_word = $_POST['remove_word'];
    if (($key = array_search($remove_word, $data['default_words'])) !== false) {
        unset($data['default_words'][$key]);
        $data['default_words'] = array_values($data['default_words']);
        file_put_contents($filepath, json_encode($data));
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function filterWords() {
            var input = document.getElementById('pesquisar_palavra');
            var filter = input.value.toLowerCase();
            var ul = document.getElementById('blocked-words-list');
            var li = ul.getElementsByTagName('li');

            for (var i = 0; i < li.length; i++) {
                var word = li[i].textContent || li[i].innerText;
                if (word.toLowerCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</head>
<body class="bg-gray-900 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gray-800 rounded-lg shadow-lg p-6 md:p-8">
            <div class="flex justify-center mb-6">
                <img src="nav-logo.png" alt="Logo" class="h-16">
            </div>
            <h1 class="text-2xl md:text-3xl font-bold mb-6 text-center">Bem-vindo, <?php echo htmlspecialchars($username); ?>!</h1>
            <form method="post" class="space-y-4">
                <div class="flex flex-col md:flex-row md:space-x-4">
                    <div class="flex-1">
                        <input id="nova_palavra" type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" name="new_word" placeholder="Bloquear nova palavra">
                    </div>
                    <button class="mt-2 md:mt-0 w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300" type="submit">
                        Bloquear
                    </button>
                </div>

                <div class="flex flex-col md:flex-row md:space-x-4">
                    <div class="flex-1">
                        <input id="palavra_remover" type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500" name="remove_word" placeholder="Remover palavra bloqueada">
                    </div>
                    <button class="mt-2 md:mt-0 w-full md:w-auto px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300" type="submit">
                        Remover
                    </button>
                </div>

                <div class="mt-6">
                    <input class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" type="text" id="pesquisar_palavra" onkeyup="filterWords()" placeholder="Buscar palavras bloqueadas">
                </div>

                <div class="mt-4 max-h-60 overflow-y-auto">
                    <ul id="blocked-words-list" class="space-y-2">
                        <?php foreach ($data['default_words'] as $word): ?>
                            <li class="bg-gray-700 px-3 py-2 rounded-lg"><?php echo htmlspecialchars($word); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </form>

            <button class="mt-8 w-full px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300" onclick="location.href='./index.php'">
                Sair
            </button>
        </div>
    </div>
</body>
</html>
