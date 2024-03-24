<?php
include __DIR__ . '/../../DB/classes/Articulo.php';
include __DIR__ . '/../../DB/classes/Recurso.php';

include __DIR__ . '/../../DB/classes/Departamentos.php';
include __DIR__ . '/../../services/storage/index.php';
if (isset($_POST['enviar'])) {
    try {
        $id = $_POST["idArticulo"];
        $titulo = $_POST['name'];
        $autor = $_POST['autor'];
        $departamento = $_POST['departamento'];
        $descripcion = $_POST['descripcion'];
        $resumen = $_POST['resumen'];
        $tags = $_POST['tag'];

        // $descripcion = str_replace("</p>","</p><br>",$descripcion);
        // $descripcion = str_replace("</li>","</li><br>",$descripcion);
        // $descripcion = str_replace("<li>","<li>&bull;",$descripcion);

        $articuloDB = new Articulo(
            array(
                "id" => $id,
                "titulo" => str_replace("'","\'",$titulo),
                "autor" => $autor,
                "descripcion" => str_replace("'","\'",$resumen),
                "idDepartamento" => $departamento,
                "fechaCreacion" => date("Y-m-d")." ".date("H:i"),
                "texto" => str_replace("'","\'",$descripcion),
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
            $path = str_replace("\\","/",$path);
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
    // $file = $_FILES['file'];

}

function getDepartamentos():array
{
    $departamentosDB = new Departamentos();
    $departamentos = $departamentosDB->list();
    $selectDepartamentos = [];
    foreach ($departamentos as $departamento) {
        // Recojo toda la query y escojo aquello que necesito
        $selectDepartamentos[$departamento['nombre']] = $departamento['id'];
    }
    echo $selectDepartamentos;
    return $selectDepartamentos;
}

function getDepartamentoWith($id){
    $departamentosDB = new Departamentos();
    $departamento = $departamentosDB->listWith($id)[0];
    return $departamento;
}

function retrieveArticle(){
    // echo "Retrieve article  ".$_GET["idArticle"];
    $articulosDB = new Articulo();
    $articulo = $articulosDB->listWith($_GET["idArticle"]);
    return $articulo;
}
?>