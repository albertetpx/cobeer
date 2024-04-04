<?php include __DIR__ . '/controller.php'; ?>
<style>
    <?php include __DIR__ . '/template.css';
    ?>
</style>

<?php $articulo = retrieveArticle()[0];?>

<div class="creacioArticulo">
    <h3 class="errores">
        <?= $errores ?? null ?>
    </h3>
    <h1>EDITA L'ARTICLE</h1>
    <form action="../home/index.php" method="post" id="form" enctype="multipart/form-data">
        <div id="part1" class="part-form-top part1">
            <label for="titulo">Introduïu el títol de l'article: </label> <br />
            <input type="text" name="name" id="name" class="name" value="<?php echo $articulo["titulo"]; ?>" />
            <span class="invalid-tooltip"></span>
            <div class="button" onclick="animation()">
                <a href="#part2">SEGÜENT</a>
            </div>
        </div>
        <div id="part2" class="part-form reveal">
            <label for="mail">Introduïu el responsable: </label> <br />
            <input type="text" name="autor" id="autor" class="autor" value="<?php echo $articulo["autor"]; ?>" />
            <div class="button">
                <a href="#header">TORNAR</a>
                <a href="#part3">SEGÜENT</a>
            </div>
        </div>
        <div id="part3" class="part-form reveal">
            <label for="descripcion">Escolliu el departament:</label>
            <br />
            <select name="departamento" id="departamento" class="departamento">
                <option value="<?php echo $articulo["idDepartamento"]; ?>" id="<?php echo $articulo["idDepartamento"]; ?>">
                    <?php echo getDepartamentoWith($articulo["idDepartamento"])["nombre"] ?>
                </option>
                <?php foreach (getDepartamentos() as $departamento => $idDepartamento) : ?>
                    <option id="<?= $idDepartamento ?>" value="<?= $idDepartamento ?>">
                        <?= $departamento ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="button">
                <a href="#part2">TORNAR</a>
                <a href="#part4">SEGÜENT</a>
            </div>
        </div>
        <div id="part4" class="part-form reveal">
            <label for="descripcion">Introduïu el contingut de l'article:</label>
            <br />
            <textarea id="mytextarea" name="descripcion"><?php echo $articulo["texto"]; ?></textarea>
            <div class="button">
                <a href="#part3">TORNAR</a>
                <a href="#part5">SEGÜENT</a>
            </div>
        </div>
        <div id="part5" class="part-form reveal">
            <label for="resumen">Introduïu un resum: </label> <br />
            <textarea name="resumen" id="resumen" class="resumen" maxlength="150"><?php echo $articulo["descripcion"]; ?></textarea>
            <div>
                <!-- <h6>*No es obligatori</h6> -->
            </div>
            <div class="button">
                <a href="#part4">TORNAR</a>
                <a href="#part6">SEGÜENT</a>
            </div>
        </div>
        <div id="part6" class="part-form reveal">
            <label for="tag">Introduïu el Tag o els Tags: </label> <br />
            <input type="text" name="tag" id="tag" class="tag" placeholder="Ejemplo: #estoesguay,#estomolamas" value="<?php echo $articulo["tags"]; ?>" />
            <div class="button">
                <a href="#part5">TORNAR</a>
                <a href="#part7">SEGÜENT</a>
            </div>
        </div>
        <div id="part7" class="part-form reveal">
            <label for="image">Tens una foto per a l'article?</label> <br />
            <!-- Componente ArrastrarArchivos -->
            <?php include '../../../components/arrastrarArchivos/component.php' ?>
            <div class="button">
                <input type="text" hidden name="idArticulo" value="<?php echo $articulo["id"]; ?>">
                <a href="#part6">TORNAR</a>
                <div class="button-submit">
                    <input id="submit" type="submit" name="editar" value="EDITA ARTICLE" />
                </div>
            </div>
        </div>
    </form>
</div>
<script src="../../../components/edicioArticulo/tinymce_6.8.3/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="../../../components/edicioArticulo/script.js"></script>