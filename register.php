<?php include("assets/components/header.php")?>
        <section class="login-container">
            <form method="post" class="form-container">
                <div>
                    <h2 class="heading-md">Crea una cuenta</h2>
                    <p class="paragraph-sm paragraph">Inicia en este mundo</p>
                </div> 
                <?php include("assets/config/conexion.php")?>
                <?php include("assets/config/controladorRegister.php")?>
                <input class="input" name="userName" type="text" placeholder="Usuario">
                
                <input class="input" name="email" type="email" placeholder="Correo">
                
                <input class="input" name="password" type="password" placeholder="Contraseña">

                <select class="input" name="selectRol" id="selectRol">
                    <option value="1" selected>Selecciona tu rol</option>
                    <option value="usuario">Usuario</option>
                    <option value="administrador">Administrador</option>
                </select>
                <input type="submit" class="button-primary" name="btnRegister" value="Crea una cuenta">
                <p class="paragraph-sm form-paragraph">¿Ya tienes cuenta? <a href="login.php">Ingresar</a></p> 
            </form>
        </section>
    </div>
    <?php include("assets/components/footer.php")?>