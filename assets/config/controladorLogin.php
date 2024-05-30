<?php
session_start();
if(!empty($_POST["btnIngresar"])){
    if(empty($_POST["usuario"]) or empty($_POST["password"])){
        echo "<div class='alert alert-danger text-center'>HAY CAMPOS QUE ESTAN VACIOS</div>";
    }else{
        $email = $_POST["usuario"];
        $password = $_POST["password"];
        $sql=$conexion->query("SELECT * FROM usuarios WHERE email='$email' AND password='$password'");
        if ($datos = $sql->fetchObject()) {
            $_SESSION["id"]=$datos->id;
            $_SESSION["nombre"]=$datos->userName;
            $_SESSION["email"]=$datos->email;
            $_SESSION["password"]=$datos->password;
            $_SESSION["rol"]=$datos->rol;
            header("location: /codershub/index.php");
        } else {
            echo "<div class='alert alert-danger text-center'>ACCESO DENEGADO</div>";
        }
    }
}