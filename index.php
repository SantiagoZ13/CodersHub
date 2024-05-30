<?php session_start()?>
<?php include("assets/components/header.php")?>
<?php include("assets/config/conexion.php")?>
<?php include("assets/config/config.php")?>

<?php

$idCategoria = isset($_GET['categoria']) ? intval($_GET['categoria']) : 0;
if ($idCategoria > 0) {
    $sqlBlogs = $conexion->prepare("SELECT id, titulo, descripcion, texto, usuario, imagen, fecha_registro FROM blogs WHERE id_categoria = ?");
    $sqlBlogs->execute([$idCategoria]);
} else {
    $sqlBlogs = $conexion->prepare("SELECT id, titulo, descripcion, texto, usuario, imagen, fecha_registro FROM blogs");
    $sqlBlogs->execute();
}

$resultado = $sqlBlogs->fetchAll(PDO::FETCH_ASSOC);
?>
        <main>
            <section class="tags-main-container">
                
                <h3 class="paragraph-sm paragraph">Bienvenido <?php echo $_SESSION['nombre']?>, espero aprendas y aproveches mucho esta gran plataforma. </h3>
                <br>
                <h2 class="heading-category">Categorias:</h2>
                    <div class="tags-container">
                        <a href="index.php?categoria=0" class="tag <?php echo $idCategoria === 0 ? 'tag-selected' : ''; ?>">TODO</a>
                        <a href="index.php?categoria=1" class="tag <?php echo $idCategoria === 1 ? 'tag-selected' : ''; ?>">TENDENCIAS</a>
                        <a href="index.php?categoria=2" class="tag <?php echo $idCategoria === 2 ? 'tag-selected' : ''; ?>">DESARROLLO WEB</a>
                        <a href="index.php?categoria=3" class="tag <?php echo $idCategoria === 3 ? 'tag-selected' : ''; ?>">HACKING</a>
                        <a href="index.php?categoria=4" class="tag <?php echo $idCategoria === 4 ? 'tag-selected' : ''; ?>">JS</a>
                        <a href="index.php?categoria=5" class="tag <?php echo $idCategoria === 5 ? 'tag-selected' : ''; ?>">SOFTWARE</a>
                        <a href="index.php?categoria=6" class="tag <?php echo $idCategoria === 6 ? 'tag-selected' : ''; ?>">REDES</a>
                        <a href="index.php?categoria=7" class="tag <?php echo $idCategoria === 7 ? 'tag-selected' : ''; ?>">HADWARE</a>
                    </div>
            </section>

            <section class="blogs-main-container">
                <?php foreach ($resultado as $row) { ?>
                <a href="single.php?id=<?php echo $row["id"];?>&token=<?php echo hash_hmac("sha256", $row["id"], KEY_TOKEN); ?>">
                <div class="card-blog">
                    <img class="blog-img" src="/codershub_zeus/img/<?= $row["imagen"]?>" alt="Imagen del blog">
                    <p class="paragraph paragraph-md"><?= $row["descripcion"] ?></p>
                    <div class="blog-footer">
                        <p><img class="blog-icon" src="data:image/png;base64,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" alt="blog creator"><?= $row["usuario"] ?></p>
                        <p><img class="blog-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAAAXNSR0IArs4c6QAABWJJREFUeF7tnU1y2jAUxyVnpjO9RXKSkEWnsA+dLsMiNIveoekdukjJIumuE5hpd7CDnKQ+RzuxGmOD+ZDRe0jyewJlGWxL+v/0vmTZliL+kSogSVuPjYsIgHgSRAARALECxM1HC4gAiBUgbj5aQGgAPt6MT7NMXCklz4UULaL+p69tz0Smnof3nUeiPjhpFmUBH/rjWyXkFyctGy+Sd00ZjxJCpCpRvdFdZwY5mNsxYADd68kUNuPBwi21yGUGd0SvYCqF+vE06NxyE9jUH9C4u9fjKyHlg+li1L9Lob6GBsEIIPf5L5n8Qy0utP3QIBgBNOH3Hbig0okVMSMkCEYA3U+TB6HEVe0MxLt86GS2Oi4UCGYA/Unufk6t1PBxMgB8CBAgAHbmgsNB23gNl/oXdYicKuCk4A7BKF63P2EFIIdZJgZTqGVyhhAkgEOCECyAAsKv05fsbdCW4BXAPIWt1ozS12wqlVI9uyyWQndHFgCKNEQXhOeivMgHIWWrZj0nPUnUxc+7TuoiQIcMwQJAIZ0OAGjdSInZ8L594QJAyDHBAoDeAlCVs1I9l8vJYEsoawgO2ZEFAL0FGCvn1Snv2ApCtAT3AHCVczoctM9cuaHFdcCWUJ5AaQnUALQxxAWQUCC4BwC+cTNftnwcfm/3XAiuu4YOwq6VVwpLsAKQD2a0sRaEunnjOAhDIewC3jQEKwCc0tBdonJ2R14AVIVYza4JD9mPyY1xdUdeACzEaGIpwiT86u8cLQENYDOINX0/ACN4CDEBDWBzUKEBMBdr27fafAbmowRghrBtO74gHC0ALhCOGgAHCEcPgBpCBFC6e6oUNQJYibcUECKAjYQHD0F+fRq833tXdgSgqdbwEPbflR0B1JTWTUGIAHasbTQBAQ5gu0Kfd/0kUWeutpfYrvP4ON8MYV0YbMVsBrB2h0tLwekeHx8i2l7TDGG9BQwEJIBim5XmpCODUOMOKg7gBwcBAMDPhx0ZBINdAW86GQEgzS9CWOGiEnVhenzWCCC/3uXNuCUzme9ChvxFCKVKkFgAApBfD7XlUIgIIRcN4IbAACKEbeMHbMEx7vxDAYgQKgggtwzYeIYGsAVhNSPTZ2fGWQAJLJyO0YqvGbvTGLApADYm+NiESwEFNPPLjjnLguoGugVhd30SvCVgxIfue93LBa0CORZLQIkvBHiyWQPYJzCH5o6w4mPeX+QEwCFD8Cl+rpszAIcIwbf4zgEcEoQmxPcCAAWhyJrAAauptNMsvhRKqIX7AC896/rv1AUdQnZkFn9NRivxvVnAoovLFNV4/2J+BrkloMV/o3qjb3Zva/RmAVsQYP6DDAJafEevyvQOABUTCkiNQ6AS37sLCiEmFOInU6qXxDZiAVzdEeXMX2jSKABO7oiD+I26ILw7WqZOzmPC5edxS/6F3+PGrO3Aco3qqMYtAO2OHBdrXGY+mQvCW8LyDGtL4CY+mQuCQtDswtsbAkj8qmC0rnChrojMBUEhaAaChgASv2qoMfFZWMBmTAC+yBsMgbP4rAD4SFG5i88OwDoE0AperSWEID5LAC4sIRTx2QKwgRCS+KwB7AMhr1gxu7h9VrhBpaG7OovcdwQdd6qSk97o7h35p69Y1AEm1RxDaDTPN40tCAB7uKO6cbMSn30M2FTR0hLYiR8cgG1LANUK+WksxQ8SQN7py/74VpbftKxbuqj+r9J/iej9ZvqtyWBiwKY7gjy9CXlAwhQkff8eLIBcmOIFsaIlEnkuMnH6uid//r2z/MOeWSJmpkdEfYsLuX7QACAD5H5MBEBMKAKIAIgVIG4+WkAEQKwAcfPRAiIAYgWIm/8Pt6NpnTBJvLkAAAAASUVORK5CYII=" alt="blog tag"><?= $row["fecha_registro"] ?></p>
                    </div>
                </div>
                </a>
                <?php } ?>
            </section>
        </main>
    </div>
    <?php include("assets/components/footer.php")?>