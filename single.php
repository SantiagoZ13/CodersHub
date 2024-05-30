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
        <section class="blogs-single-container">
            <div class="blog-title-container">
                <h2 class="heading-md"><?php echo $titulo ?></h2>
                <p class="paragraph-md paragraph"><?php echo $usuario; ?> - <?php echo $fecha_registro ?></p>   
            </div>
            <img class="wd-100" src="/codershub_zeus/img/<?= $imagen?>" alt="Blog single">
                <p class="paragraph-md paragraph"><?php echo $descripcion ?></p>
                <p class="paragraph-md paragraph"><?php echo $texto ?></p>
        </section>
    </main>
    <?php include("assets/components/footer.php")?>