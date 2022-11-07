<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>
    <div id="corpo-center" style="margin-top: 8vh;">

        <h1> Registro</h1><!-- titulo -->

        <?php
        
            require_once "login.php";

            if( isset($_POST['btn-registrar']) ){// boton registrar

                // pegando input
                $nombre     = addslashes($_POST['nombre']);
                $apellidos  = addslashes($_POST['apellidos']);
                $email      = addslashes($_POST['email']);
                $password   = addslashes($_POST['password']);
                $passwordConf = addslashes($_POST['passwordConf']);

                // inserindo
                $registrar = new Login();
                $registrar-> registro($nombre, $apellidos, $email ,$password, $passwordConf);

            }
         
        ?>

        <!-- Formulario -->
        <form action="" method="post">  
            <input type="text" name="nombre" placeholder="nombre"  >
            <input type="text" name="apellidos" placeholder="apellidos" >
            <input type="email" name="email" placeholder="Email" >
            <input type="password" name="password" placeholder="password"  >
            <input type="password" name="passwordConf" placeholder="Confirmar password" >
            <!-- Botones -->
            <button type="submit" name="btn-registrar"> registrar </button>
            <a href="index.php"> Ja sou inscrito. <strong> Fazer login!!</strong></a>
        </form>

        <footer> JLM </footer>
    </div>
</body>

</html>