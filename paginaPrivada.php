<?php
    session_start();

    if(!isset($_SESSION['id']) ){
        header("location: index.php");
    }else{
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Privada</title>
</head>
<body>

    <?php 
    
    }
    ?>   
    <h1> <?php echo "Hola id:   ".$_SESSION['id'];?></h1>     
    <h1> <?php echo "Hola nombre:  ".$_SESSION['nombre'];?></h1>    
    <h1> <?php echo "Hola apellidos ".$_SESSION['apellidos'];?></h1>    
    <h1> <?php echo "Hola email: ".$_SESSION['email'];?></h1>    

    <a href="salir.php"> Salir</a>

</body>
</html>