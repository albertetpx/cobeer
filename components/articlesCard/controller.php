<?php
include_once __DIR__ . '/../../DB/classes/Articulo.php';
function getArticulos()
{
    $articulosDB = new Articulo();
    $articulos = $articulosDB->listPinned();
    foreach ($articulos as $articulo) {
        include dirname(__DIR__, 1) . '/articleCard/component.php';
    }
    if (isset($_GET['page']) and $_GET['page'] >= 2){
        $articulos = $articulosDB->listNext10Unpinned(($_GET['page']-1)*10);
        foreach ($articulos as $articulo) {
            include dirname(__DIR__, 1) . '/articleCard/component.php';
        }
    }
    else{
        $articulos = $articulosDB->listLast10Unpinned();
    foreach ($articulos as $articulo) {
        include dirname(__DIR__, 1) . '/articleCard/component.php';
    }
    }
    
}
?>