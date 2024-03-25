<?php
require_once __DIR__ . '../../../../DB/classes/Recurso.php';
require_once __DIR__ . '../../../../DB/classes/Articulo.php';

if (isset($_POST['esborrar'])) {
  borrarArticle();
}

if (isset($_POST['fixar'])) {
  fixarArticle();
}

if (isset($_POST['desfixar'])) {
  desfixarArticle();
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
      $articuloDB = new Articulo();

      $recursosDB = new Recurso();

      $recurso = $recursosDB->delete($idArticulo);
      $articulo = $articuloDB->delete($idArticulo);
    }
  } catch (Exception $e) {
    $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
  }
}
