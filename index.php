<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="container mx-auto px-4">
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden max-w-md mx-auto">
            <div class="p-8">
                <div class="flex justify-center mb-6">
                    <img src="nav-logo.png" alt="Logo" class="h-16">
                </div>
                <form class="space-y-6" action="./login.php" method="post">
                    <div class="relative">
                        <i class="fas fa-user absolute top-3 left-3 text-gray-400"></i>
                        <input type="text" class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-600 bg-gray-700 text-white focus:outline-none focus:border-blue-500" name="username" placeholder="Nome de Usuário" required>
                    </div>
                    <div class="relative">
                        <i class="fas fa-lock absolute top-3 left-3 text-gray-400"></i>
                        <input type="password" class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-600 bg-gray-700 text-white focus:outline-none focus:border-blue-500" name="password" placeholder="Senha" required>
                    </div>
                    <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300" type="submit">
                        <span class="mr-2">Login</span>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </form>
                
                <!-- Comentário: Formulário de registro -->
                <!--
                <form class="mt-8 space-y-6" action="register.php" method="post">
                    <div class="relative">
                        <i class="fas fa-user absolute top-3 left-3 text-gray-400"></i>
                        <input type="text" class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-600 bg-gray-700 text-white focus:outline-none focus:border-blue-500" name="username" placeholder="Nome de Usuário" required>
                    </div>
                    <div class="relative">
                        <i class="fas fa-lock absolute top-3 left-3 text-gray-400"></i>
                        <input type="password" class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-600 bg-gray-700 text-white focus:outline-none focus:border-blue-500" name="password" placeholder="Senha" required>
                    </div>
                    <button class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300" type="submit">
                        <span class="mr-2">Register</span>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </form>
                -->
            </div>
        </div>
    </div>
</body>
</html>
