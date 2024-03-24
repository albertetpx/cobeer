<?php
function deleteDir($articleId)
{
    $dirPath = dirname(__DIR__, 2) . "/DB/local/media/" . $articleId . "/";
    
    if (is_dir($dirPath)) {
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
}

function storeFiles($file, $idArticulo)
{
    $target_dir = dirname(__DIR__, 2) . "/DB/local/media/" . $idArticulo . "/"; // specify the directory where the files should be stored
    $error = "";
    $paths = [];
    foreach ($file["tmp_name"] as $key => $tmp_name) {
        // Obtener la información del archivo
        $file_name = str_replace(" ", "", $file["name"][$key]);
        $file_tmp = $file["tmp_name"][$key];
        $file_target = $target_dir . basename($file_name);
        $resource_target = "/DB/local/media/" . $idArticulo . "/" . basename($file_name);

        // Check if image file is a actual image or fake image
        if ($file_tmp == "") {
            break;
        }
        $check = getimagesize($file_tmp);
        if ($check === false) {
            $error .= "- Fitxer : El fitxer no és una imatge. <br>";
        }

        // Check if file already exists
        if (file_exists($file_target)) {
            $error .= " - Fitxer : Ho sentim, el fitxer ja existeix. <br>";
        }

        // Check file size 5mb
        if ($file["size"][$key] > 5000000) {
            $error .= "- Fitxer : Ho sentim, el fitxer és massa gran. <br>";
        }

        // Allow certain file formats
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $extension = strtolower(pathinfo($file_target, PATHINFO_EXTENSION));
        if (!in_array($extension, $allowed_extensions)) {
            $error .= "- Ho sentim, només s'admeten fitxers JPG, JPEG, PNG i GIF. <br>";
        }

        if ($error != null) {
            throw new Exception($error);
        } else {

            if (!file_exists($target_dir))
                mkdir($target_dir);
            $savePicStatus = file_put_contents($file_target, file_get_contents($file_tmp));
            // array_push($paths, $file_target);
            array_push($paths, $resource_target);
        }
    }
    return $paths;
}
