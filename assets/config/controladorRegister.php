<?php
session_start();
if(!empty($_POST["btnRegister"])){
    if(empty($_POST["userName"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["selectRol"])){
        echo "<div class='alert alert-danger text-center'>HAY CAMPOS QUE ESTAN VACIOS</div>";
    }else{
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rol = $_POST['selectRol'];
        if($rol == "administrador"){
            $passwordAdmin = '246QERmnb_';
            $sql=$conexion->query("INSERT INTO usuarios(userName, email, password, rol, passwordAdmin) VALUES ('$userName', '$email','$password','$rol', '$passwordAdmin')");
            echo "<div class='alert alert-danger text-center'>ADMINISTRADOR CREADO CORRECTAMENTE<br>Clave dinamica Creada</div>";
        }else{
            $sql=$conexion->query("INSERT INTO usuarios(userName, email, password, rol) VALUES ('$userName', '$email','$password','$rol' )");
            echo "<div class='alert alert-danger text-center'>USUARIO CREADO CORRECTAMENTE</div>";
        }
        
    }
}