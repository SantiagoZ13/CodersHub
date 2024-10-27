<?php
include("assets/config/conexion.php");
include("assets/config/config.php");
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$token = isset($_GET["token"]) ? $_GET["token"] : "";

if($id == "" || $token == ""){
    echo "Error al procesar la petición";
    exit;
}else{
    $token_tmp = hash_hmac("sha256", $id, KEY_TOKEN);
    if($token == $token_tmp){
        $sql = $conexion->prepare("SELECT count(id) FROM blogs WHERE id=?");
        $sql->execute([$id]);
        if($sql->fetchColumn() > 0 ){
            $sql = $conexion->prepare("SELECT id, titulo, descripcion, texto, usuario, imagen, fecha_registro FROM blogs WHERE id=? LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $titulo = $row["titulo"];
            $descripcion = $row["descripcion"];
            $texto = $row["texto"];
            $usuario = $row["usuario"];
            $imagen = $row["imagen"];
            $fecha_registro = $row["fecha_registro"];
        }
    }else{
        echo "Error al procesar la petición";
        exit;
    }
}
?>
<?php include("assets/components/header.php");?> 
<main>
<section class="m-4 blogs-single-container">
    <div class="blog-title-container">
        <h2 class="heading-md"><?php echo $titulo ?></h2>
        <p class="paragraph-md paragraph"><?php echo $usuario; ?> - <?php echo $fecha_registro ?></p>
    </div>
    <p class="paragraph-md paragraph"><?php echo $descripcion ?></p>
    <div class="d-flex flex-wrap justify-content-center align-items-center">
        <div class="p-2" style="flex: 1 1 50%;">
            <img class="w-100 rounded-pill" src="/codershub_zeus/img/<?= $imagen ?>" alt="Blog single">
        </div>
        <div class="p-2" style="flex: 1 1 50%;">
            <p class="paragraph-md paragraph text-center"><?php echo $texto ?></p>
        </div>
    </div>
</section>

<style>
.blogs-single-container {
    padding: 20px;
}

.blog-title-container {
    margin-bottom: 20px;
}

.paragraph-md {
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .d-flex > div {
        flex: 1 1 100%;
        max-width: 100%;
    }
}
</style>
    </main>
    <?php include("assets/components/footer.php")?>