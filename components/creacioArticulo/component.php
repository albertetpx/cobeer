<?php include __DIR__ . '/controller.php'; ?>
<style>
    <?php include __DIR__ . '/template.css';
?>
</style>

<div class="creacioArticulo">
    <h3 class="errores">
        <?= $errores ?? null ?>
    </h3>
    <h1>PUBLICA UN NOU ARTICLE</h1>
    <form action="#" method="post" id="form" enctype="multipart/form-data">
        <div id="part1" class="part-form-top">
            <label for="titulo">Introduïu el títol de l'article: </label> <br />
            <input type="text" name="name" id="name" class="name" required />
            <div class="button" onclick="animation()">
                <a href="#part2">SEGÜENT</a>
            </div>
        </div>
        <div id="part2" class="part-form reveal">
            <label for="mail">Introduïu el responsable: </label> <br />
            <input type="text" name="autor" id="autor" class="autor" required />
            <div class="button">
                <a href="#header">TORNAR</a>
                <a href="#part3">SEGÜENT</a>
            </div>
        </div>
        <div id="part3" class="part-form reveal">
            <label for="descripcion">Escolliu el departament:</label>
            <br />
            <select name="departamento" id="departamento">
                <?php foreach(getDepartamentos() as $departamento => $idDepartamento):?>
                    <option id="<?=$idDepartamento?>" value="<?=$idDepartamento?>">
                        <?=$departamento?>
                    </option>
                <?php endforeach;?>
            </select>
            <div class="button">
                <a href="#part2">TORNAR</a>
                <a href="#part4">SEGÜENT</a>
            </div>
        </div>
        <div id="part4" class="part-form reveal">
            <label for="descripcion">Introduïu el contingut de l'article:</label>
            <br />
            <!-- <textarea name="descripcion" id="descripcion" cols="30" rows="10" required></textarea> -->
            <textarea id="mytextarea" name="descripcion">Hello, World!</textarea>
            <div class="button">
                <a href="#part3">TORNAR</a>
                <a href="#part5">SEGÜENT</a>
            </div>
        </div>
        <div id="part5" class="part-form reveal">
            <label for="resumen">Introduïu un resum: </label> <br />
            <textarea name="resumen" id="resumen" maxlength="150"></textarea>
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
            <input type="text" name="tag" id="tag" class="tag" placeholder="Ejemplo: #estoesguay,#estomolamas"
                required />
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
                <a href="#part6">TORNAR</a>
                <div class="button-submit">
                    <input type="submit" name="enviar" value="SUBMIT" />
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    <?php include __DIR__ . '/script.js'; ?>
    tinymce.init({
        selector: 'textarea#mytextarea'
    });
</script>