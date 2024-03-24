<?php
// include __DIR__ . '/../../DB/classes/Articulo.php';
include __DIR__ . '/../../DB/classes/Departamentos.php';

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