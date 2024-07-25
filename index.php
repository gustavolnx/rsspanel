<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./index2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="./login.php" method="post">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="username" placeholder="Nome de Usuário" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Senha" required>
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Login</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
         
        <!-- register -->
         
        <!-- <form class="register" action="register.php" method="post">
            <div class="register__field">
                <i class="register__icon fas fa-user"></i>
                <input type="text" class="register__input" name="username" placeholder="Nome de Usuário" required>
            </div>
            
            <div class="register__field">
                <i class="register__icon fas fa-lock"></i>
                <input type="password" class="register__input" name="password" placeholder="Senha" required>
            </div>
            <button class="button register__submit" type="submit">
                <span class="button__text">Register</span>
                <i class="button__icon fas fa-chevron-right"></i>
            </button>
        </form> -->

        
    </div>
</body>
</html>
