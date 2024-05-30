<?php include("assets/components/header.php")?>

        <section class="login-container">
            <form method="post" class="form-container">
                <div>
                    <h2 class="heading-md">Entra en CodersHub</h2>
                    <p class="paragraph-sm paragraph">Para ver nuestros blogs</p>
                </div>
                <?php include("assets/config/conexion.php")?>
                <?php include("assets/config/controladorLogin.php")?>
                <input class="input" id="email" type="text" name="usuario" placeholder="Correo">
                
                <input class="input" id="password" type="password" name="password" placeholder="Contraseña">
                
                <input type="submit" class="button-primary" name="btnIngresar" value="Ingresar">
                <p class="paragraph-sm form-paragraph">¿Aún no tienes cuenta? <a href="register.php">Registrate</a></p> 
            </form>
        </section>
    </div>
<?php include("assets/components/footer.php")?>