<?php
require_once __DIR__ . '../../../../DB/classes/Recurso.php';
require_once __DIR__ . '../../../../DB/classes/Articulo.php';
include __DIR__ . '/../../../services/storage/index.php';


if (isset($_POST['esborrar'])) {
  borrarArticle();
}

if (isset($_POST['fixar'])) {
  fixarArticle();
}

if (isset($_POST['desfixar'])) {
  desfixarArticle();
}

if (isset($_POST['crear'])) {
  crearArticle();
}

if (isset($_POST['editar'])) {
  editarArticle();
}

function crearArticle()
{
  try {
    $titulo = $_POST['name'];
    $autor = $_POST['autor'];
    $departamento = $_POST['departamento'];
    $descripcion = $_POST['descripcion'];
    $resumen = $_POST['resumen'];
    $tags = $_POST['tag'];

    $descripcion = str_replace("</p>", "</p><br>", $descripcion);
    $descripcion = str_replace("<li>", "<li>&bull", $descripcion);

    $articuloDB = new Articulo(
      array(
        "titulo" => str_replace("'", "\'", $titulo),
        "autor" => $autor,
        "descripcion" => str_replace("'", "\'", $resumen),
        "idDepartamento" => $departamento,
        "fechaCreacion" => date("Y-m-d") . " " . date("H:i"),
        "texto" => str_replace("'", "\'", $descripcion),
        "tags" => $tags
      )
    );

    $articulo = $articuloDB->insert();

    $paths = storeFiles($_FILES["fileToUpload"], $articulo['id']);
    foreach ($paths as $path) {
      $path = str_replace("\\", "/", $path);
      // echo $path;
      $recursoDB = new Recurso(
        array(
          "url" => $path,
          "idArticulo" => $articulo['id']
        )
      );
      $recurso = $recursoDB->insert();
    }
  } catch (Exception $e) {

    $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
  }
}

function editarArticle()
{
  try {
    $titulo = $_POST['name'];
    $autor = $_POST['autor'];
    $departamento = $_POST['departamento'];
    $descripcion = $_POST['descripcion'];
    $resumen = $_POST['resumen'];
    $tags = $_POST['tag'];
    $id = $_POST['idArticulo'];

    // $descripcion = str_replace("</p>", "</p><br>", $descripcion);

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

    // Check if new photo has been uploaded
    if ($_FILES['fileToUpload']['name'][0] != "") {
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

    }


  } catch (Exception $e) {

    $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
  }
}


function fixarArticle()
{
  try {
    $idArticulo = $_POST['id'];

    $articuloDB = new Articulo(
      array(
        "id" => $idArticulo,
        "indBaja" => True
      )
    );

    $articulo = $articuloDB->update();

  } catch (Exception $e) {
    $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
  }
}

function desfixarArticle()
{
  try {
    $idArticulo = $_POST['id'];

    $articuloDB = new Articulo(
      array(
        "id" => $idArticulo,
        "indBaja" => 0
      )
    );

    $articulo = $articuloDB->update();

  } catch (Exception $e) {
    $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
  }
}

function borrarArticle()
{
  try {
    $idArticulo = $_POST['id'];
    $pass = $_POST['clau'];

    if ($pass == "drocacobeer") {
      // Remove local resources for currentArticleID
      deleteDir($idArticulo);

      $articuloDB = new Articulo();

      $recursosDB = new Recurso();

      $recurso = $recursosDB->delete($idArticulo);
      $articulo = $articuloDB->delete($idArticulo);
    }
  } catch (Exception $e) {
    $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
  }
}
