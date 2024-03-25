<?php
include __DIR__ . '/../../DB/classes/Recurso.php';
include __DIR__ . '/../../DB/classes/Articulo.php';
include_once __DIR__ . '/../../DB/classes/Departamentos.php';

// if (isset($_POST['enviar'])) {
//     try {
//         echo "Borrando articulo...";
//         $idArticulo = $_POST['id'];
//         $pass = $_POST['clau'];

//         $articuloDB = new Articulo(
//         );

//         $recursosDB = new Recurso(
//         );
        
//         $recurso = $recursosDB->delete($idArticulo);
//         $articulo = $articuloDB->delete($idArticulo);

//         header("Location: ./view/pages/home");
//         exit();

//     } catch (Exception $e) {

//         $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();

//     }
// }

function getArticulo($id)
{
    $articulosDB = new Articulo();
    $articulo = $articulosDB->listWith($id)[0];
    return $articulo;
}

function getDepartamento($id)
{
    $departamentosDB = new Departamentos();
    $departamento = $departamentosDB->listWith($id);
    return $departamento;
}

function getImagenes($id)
{
    $recursosDB = new Recurso();
    $imagenes = $recursosDB->listWith($id);
    return $imagenes;
}
?>