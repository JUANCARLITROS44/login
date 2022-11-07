<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div id="corpo-center">
        <h1>Login</h1><!-- titulo -->R
        <?php  
            require_once "login.php";            
            if(isset($_POST['btn-entrar']) ){// boton registrar

            // pegando input
            $email      = addslashes($_POST['email']);
            $password   = addslashes($_POST['password']);           

            // inserindo
            $logar = new Login();
            $logar-> logar($email, $password);
            }  
        ?>
        <!-- Formulario -->
        <form action="" method="post">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="password" placeholder="Password" required=""> 

            <!-- Botones -->
            <button type="submit" name="btn-entrar"> Entrar </button>
            <a href="registro.php"> Estas registrado? <strong>  Registrate ahora!!</strong> </a>
        </form>
    </div>

    <footer> JLM </footer>
</body>

</html>