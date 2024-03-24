<style>
    <?php include __DIR__ . '/template.css';
    ?>
</style>
<?php include_once __DIR__ . '/controller.php'; ?>

<div class="defaultCardContainer">
    <?php if ($articulo['indBaja'] == 1) {
        echo "<div class='defaultCardFixIcon'><img src='../../../assets/imagenes/fix.png'/></div>";
    }
    ?>
    <?php $articleUrl = "../../../view/pages/articuloDepartamento?articleId=" . $articulo['id']; ?>
    <a href=<?= $articleUrl; ?>>
        <div class="defaultCardImage">
            <!-- <img src=<?= getFirstImage($articulo['id']); ?>  alt=""> -->
            <img src=<?= "../../.." . getFirstImage($articulo['id']); ?> alt="">
        </div>

        <div class="defaultCardText">
            <div class="defaultCardTitle">
                <h1>
                    <?= $articulo['titulo']; ?>

                </h1>
            </div>
            <div class="defaultCardDescription">
                <p>
                    <?= $articulo['descripcion']; ?>
                </p>
            </div>
        </div>
    </a>
</div>