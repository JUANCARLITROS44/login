<?php

require_once "conexion.php";

class Login {
    public function registro($nombre, $apellidos, $email, $password, $passwordConf) {

        if (empty($nombre) || empty($apellidos) || empty($email) || empty($password) || empty($passwordConf)) {
            // campo vacio
        } else {

            $sql = "SELECT * FROM usuario WHERE email = :e";
            $stmt = Conexion::getConexion()->prepare($sql);
            $stmt->bindValue(":e", $email);

            $stmt->execute();

            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($dados) > 0) { // email ya existe
                echo '<div id="alert">Email ya registrado</div>';
            } else { // email no existe


                if ($password == $passwordConf) { //confirmar password
                    $password = md5($password);  // encriptar password

                    $sql = "INSERT INTO usuario (nombre, apellidos, email, password) VALUES (?,?,?,?)";
                    $stmt = Conexion::getConexion()->prepare($sql);
                    $stmt->bindValue(1, $nombre);
                    $stmt->bindValue(2, $apellidos);
                    $stmt->bindValue(3, $email);
                    $stmt->bindValue(4, $password);

                    $stmt->execute();
                    echo '<div id="alert">Registrado con exito</div>';
                } else {

                    echo '<div id="alert">Password incorrecto !! Confirme el password </div>';
                }
            }
        }
    }

    public function logar($email, $password){

        if (empty($email) || empty($password)) {// campo vacio
            
            echo "email y password necesarios ";

        } else {// campo llenos 
            
            // consulta
            $sql = "SELECT * FROM usuario WHERE email = ?";
            $stmt = Conexion::getConexion()->prepare($sql);
            $stmt->bindValue(1, $email);

            $stmt->execute();

            $dados = $stmt->fetchALL(PDO::FETCH_ASSOC);


            if (count($dados) > 0) { // email correcto

                $password = md5($password); // encriptar password

                // consulta
                $sql = "SELECT password FROM usuario WHERE email = ?";
                $stmt = Conexion::getConexion()->prepare($sql);
                $stmt->bindValue(1, $email);

                $stmt->execute();
                $dados = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($password == $dados['password']) { // password correcto
                    
                    // consulta
                    $sql = "SELECT * FROM usuario WHERE email = ?";
                    $stmt = Conexion::getConexion()->prepare($sql);
                    $stmt->bindValue(1, $email);

                    $stmt->execute();

                    $dadosAll = $stmt->fetch(PDO::FETCH_ASSOC);

                    // session
                    session_start();
                    $_SESSION['id'] = $dadosAll['id'];
                    $_SESSION['nombre'] = $dadosAll['nombre'];
                    $_SESSION['apellidos'] = $dadosAll['apellidos'];
                    $_SESSION['email'] = $dadosAll['email'];
    
                    header("location: paginaPrivada.php");

                } else { // password incorrecto
                    echo '<div id="alert">Password incorrecto !!</div>';
                }
            } else { // email incorrecto
                echo ' <div id="alert">Cuenta no registrada !!</div>';
            }
        }
    }
}
