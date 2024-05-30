<?php include("assets/components/header.php")?>
        <section class="contact-container">
            <form class="form-container" action="">
                <div>
                    <label class="label" for="name">Nombre</label>
                    <input class="input" type="text">
                </div>
                <div class="container-inputs-same-column">
                    <div class="wd-100">
                        <label class="label" for="email">Correo</label>
                        <input class="input" type="text">
                    </div>
                    <div class="wd-100">
                        <label class="label" for="phone">Numero</label>
                        <input class="input" type="text">
                    </div>
                </div>
                <div>
                    <label class="label" for="message">Mensaje</label>
                    <textarea cols="50" rows="4" class="input" name="message" id="message"></textarea>
                </div>
                <a class="button-primary" href="">Enviar</a>
            </form>
            <div class="contact-info">
                <h2 class="heading-big">Contactame</h2>
                <p class="paragraph paragraph-md">Hola, soy Santiago, un estudiante de ingeniería de sistemas y un fullstack developer con experiencia en diferentes tecnologías</p>
                <div class="contact-links">
                    <a class="paragraph paragraph-sm " href="tel:+573138125514"><img src="assets/tel-icon.png" alt="icono de telefono">+57 313-812-5514</a>
                    <a class="paragraph paragraph-sm " href="mailto:diazsantiagoponce1@gmail.com"><img src="assets/email-icon.png" alt="icono de email">diazsantiagoponce1@gmail.com</a>
                    <a class="paragraph paragraph-sm under" href="https://github.com/SantiagoZ13"><img src="assets/github-icon.png" alt="icono de GitHub">SantiagoZ13</a>
                    <a class="paragraph paragraph-sm under" target="_blank" href="https://santiagoz.online"><img src="assets/code-icon.png" alt="icono de portafolio">Mi Portafolio</a>
                </div>
                
            </div>
        </section>
    </div>
    <?php include("assets/components/footer.php")?>