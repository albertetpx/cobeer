<style>
<?php include __DIR__ . '/template.css';
?>
</style>
<?php include __DIR__ . '/controller.php'; ?>

<div class="tituloArtDest">   
      <?php
      if (isset($_GET["tag"])){
            echo "<h1>Articles amb la paraula clau: '".$_GET["tag"]."'</h1>";
            
      }
      elseif (isset($_GET["departamento"])){
            echo "<h1>Articles creats pel departament de : '".getNombreDept($_GET["departamento"])."'</h1>";
      }     
      ?>       
</div>
<div class="articlesCardContainer">
<?php
      if (isset($_GET["tag"])){
            getArticulosTagged($_GET["tag"]);
            
      }
      elseif (isset($_GET["departamento"])){
            getArticulosDept($_GET["departamento"]);
      }     
      ?>
</div>