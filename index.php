<?php
    require_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">

	<style>
		.content {
			margin-top: 80px;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include('nav.php');?>
	</nav>

	<div class="container">
		<div class="content">
			<h2>Indice &raquo; </h2>
			<hr />

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
            <div class="form-row align-items-center mb-3 p-3">            
				<form action="" method="post">

					<input type="email" name="email" placeholder="Email" required=""> <br><br>   
					<input type="password" name="password" placeholder="Password" required=""> <br><br>         							

					<!-- Botones -->
					<button type="submit" name="btn-entrar"> Entrar </button> <br><br>   
					<a href="registro.php"> Estas registrado? <strong>  Registrate ahora!!</strong> </a>     
				</form>
			</div> 
			
        </div>
    </div>
	<hr>

	</div><center>
	<p>&copy; Proyecto DAW <?php echo date("Y");?></p
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>


















