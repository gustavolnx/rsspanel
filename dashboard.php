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
    <link rel="stylesheet" href="./index2.css">
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
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <h1 class="h1-bv">Bem-vindo, <?php echo htmlspecialchars($username); ?>!</h1>
                <form class="login" method="post">
                    <div class="login__field">
                        <i class="login__icon fas fa-plus"></i>
                        <input id="nova_palavra" type="text" class="login__input" name="new_word" placeholder="Bloquear nova palavra">
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Bloquear</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>

                    <div class="login__field">
                        <i class="login__icon fas fa-minus"></i>
                        <input id="palavra_remover" type="text" class="login__input" name="remove_word" placeholder="Remover palavra bloqueada">
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Remover</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>

                    <div class="filtro-palavras">
                    <input class="pesquisar_p" type="text" id="pesquisar_palavra" onkeyup="filterWords()" placeholder="Buscar palavras bloqueadas">
                <div class="container-palavras">
  
                    <ul id="blocked-words-list">
                        <?php foreach ($data['default_words'] as $word): ?>
                            <li><?php echo htmlspecialchars($word); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                
                </form>
           

                    </div>
                    
                    <button class="button login__submit" type="submit" onclick="location.href='./index.php'">
                        <span class="button__text">Sair</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>

     
             
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>
</html>
