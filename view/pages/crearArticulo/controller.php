<?php
include __DIR__ . '/../../../DB/classes/Articulo.php';
include __DIR__ . '/../../../DB/classes/Recurso.php';
include __DIR__ . '/../../../services/storage/index.php';

// if (isset($_POST['crear'])) {
//     try {
//         $titulo = $_POST['name'];
//         $autor = $_POST['autor'];
//         $departamento = $_POST['departamento'];
//         $descripcion = $_POST['descripcion'];
//         $resumen = $_POST['resumen'];
//         $tags = $_POST['tag'];

//         $descripcion = str_replace("</p>", "</p><br>", $descripcion);
//         $descripcion = str_replace("<li>", "<li>&bull", $descripcion);

//         $articuloDB = new Articulo(
//             array(
//                 "titulo" => str_replace("'", "\'", $titulo),
//                 "autor" => $autor,
//                 "descripcion" => str_replace("'", "\'", $resumen),
//                 "idDepartamento" => $departamento,
//                 "fechaCreacion" => date("Y-m-d") . " " . date("H:i"),
//                 "texto" => str_replace("'", "\'", $descripcion),
//                 "tags" => $tags
//             )
//         );

//         $articulo = $articuloDB->insert();

//         $paths = storeFiles($_FILES["fileToUpload"], $articulo['id']);
//         foreach ($paths as $path) {
//             $path = str_replace("\\", "/", $path);
//             // echo $path;
//             $recursoDB = new Recurso(
//                 array(
//                     "url" => $path,
//                     "idArticulo" => $articulo['id']
//                 )
//             );
//             $recurso = $recursoDB->insert();
//         }
//     } catch (Exception $e) {

//         $errores = "Hay que revisar esos puntos : <br> " . $e->getMessage();
//     }
//     header("Location: ../home");
// }
