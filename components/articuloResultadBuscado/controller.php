<?php
include __DIR__ . '/../../DB/classes/Articulo.php';
include __DIR__ . '/../../DB/classes/Departamentos.php';

function getArticulosTagged($tag)
{
    $articulosDB = new Articulo();
    $articulos = $articulosDB->search($tag);
    foreach ($articulos as $articulo) {
        include dirname(__DIR__, 1) . '/articleCard/component.php';
    }
}

function getArticulosDept($idDepartamento)
{
    $articulosDB = new Articulo();
    $articulos = $articulosDB->listDepto($idDepartamento);
    foreach ($articulos as $articulo) {
        include dirname(__DIR__, 1) . '/articleCard/component.php';
    }
}

function getNombreDept($idDepartamento){
    $departamentosDB = new Departamentos();
    $departamento = $departamentosDB->listWith($idDepartamento);
    return $departamento[0]["nombre"];}
?>