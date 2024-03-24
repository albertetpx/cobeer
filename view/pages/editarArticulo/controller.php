<?php
include __DIR__ . '/../../../DB/classes/Articulo.php';
include __DIR__ . '/../../../DB/classes/Recurso.php';
include __DIR__ . '/../../../services/storage/index.php';

if (isset($_POST['enviar'])) {  
    try {
        $titulo = $_POST['name'];
        $autor = $_POST['autor'];
        $departamento = $_POST['departamento'];
        $descripcion = $_POST['descripcion'];
        $resumen = $_POST['resumen'];
        $tags = $_POST['tag'];
        $id = $_POST['idArticulo'];

        $articuloDB = new Articulo(
            array(
                "id" => $id,
                "titulo" => str_replace("'", "\'", $titulo),
                "autor" => $autor,
                "descripcion" => str_replace("'", "\'", $resumen),
                "idDepartamento" => $departamento,
                "fechaCreacion" => date("Y-m-d") . " " . date("H:i"),
                "texto" => str_replace("'", "\'", $descripcion),
                "tags" => $tags
            )
        );

        $articulo = $articuloDB->update();

        // Remove local resources for currentArticleID
        deleteDir($id);
        // Remove all DB resources for currenArticleID
        $recursosDB = new Recurso();
        $recurso = $recursosDB->delete($id);

        $paths = storeFiles($_FILES["fileToUpload"], $id);
        foreach ($paths as $path) {
            $path = str_replace("\\", "/", $path);
            // echo $path;
            $recursoDB = new Recurso(
                array(
                    "url" => $path,
                    "idArticulo" => $id
                )
            );
            $recurso = $recursoDB->insert();
        }
    } catch (Exception $e) {

        $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
    }
    header("Location: ../home");
}
