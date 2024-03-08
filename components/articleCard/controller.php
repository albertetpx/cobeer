<?php
include_once __DIR__ . '/../../DB/classes/Recurso.php';

function getFirstImage($articleId)
{
    $recursosDB = new Recurso();

    $images = $recursosDB->listWith($articleId);
    if (count($images)!=0){
        $firstImage=$images[0];
        return $firstImage["url"];
    }
    else{
        return "/DB/local/media/dummy.jpg";
    }
}
?>