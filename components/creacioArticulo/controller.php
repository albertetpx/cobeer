<?php
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
?>