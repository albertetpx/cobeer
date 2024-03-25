<?php
include_once __DIR__ . '/../../DB/classes/Departamentos.php';
function getArticulos()
{
    $departamentosDB = new Departamentos();
    $departamentos = $departamentosDB->list();
    $selectDepartamentos = [];
    // var_dump($departamentos);
    foreach ($departamentos as $departamento) {
        // Recojo toda la query y escojo aquello que necesito
        $selectDepartamentos[$departamento['nombre']] = $departamento['id'];
    }
    // print_r($selectDepartamentos);
    var_dump($selectDepartamentos);
    echo(count($selectDepartamentos));
    // foreach($selectDepartamentos as $clave=>$valor){
    //     $nombreDep=$clave;
    //     $idDepartamento=$valor;
    // }

    // $keys = array_keys($selectDepartamentos);
    // $firstKey = $keys[0];
    // echo "La primera clave del array es: " . $firstKey;
}
getArticulos();
?>
