<?php include __DIR__ . '/controller.php'; ?>

<style>
  <?php include __DIR__ . '/template.css'; ?>
</style>

<?php
$articulo = getArticulo($_GET["articleId"]);
$departamento = getDepartamento($articulo["idDepartamento"])[0];
?>

<article class="post">

  <section class="awSlider">
    <div id="carousel" class="carousel">
      <button class="arrow prev">◁</button>
      <div class="gallery">
        <ul>
          <?php
          $imagenes = getImagenes($_GET["articleId"]);
          if (count($imagenes) != 0) {
            foreach ($imagenes as $imagen) {
              $img_url = $imagen["url"];
              echo "<li><img src=" . "../../.." . $img_url . "></li>";
            }
          } else {
            $img_url =  "/DB/local/media/dummy.jpg";
            echo "<li><img src=" . "../../.." . $img_url . "></li>";
          }
          ?>
        </ul>
      </div>
      <button class="arrow next">▷</button>
    </div>
  </section>

  <div class="post__container">
    <span class="post__category">
      <?= $departamento["nombre"]; ?>
    </span>

    <div class="post__content">
      <header>
        <time class="post__time">
          <?= $articulo["fechaCreacion"]; ?>
        </time>
        <!-- <h1 class="post__header"><span>Shift the overall look </span> <span>and feel by adding these</span> <span>wonderful
            touches to furniture in your home</span></h1> -->
        <h1 class="post__header">
          <span>
            <?= $articulo["titulo"]; ?>
          </span>
        </h1>
      </header>

      <p class="post__text">
        <?= $articulo["texto"]; ?>
      </p>

      <br>
      <div class="user flex p-1">
        <?php if ($articulo["indBaja"] == 1) {
          echo '<div class="avatar pin pinned"></div>';
        } elseif ($articulo["indBaja"] == 0) {
          echo '<div class="avatar pin unpinned"></div>';
        } ?>
        <div class="avatar edit"></div>
        <div class="avatar delete"></div>
        <div class="user-detail">
          <h2 class="name">
            <?= $articulo["autor"]; ?>
          </h2>
        </div>
      </div>
    </div>
  </div>
</article>
<div id="editModal">
  <h3>Segur que vols editar l'article?</h3>
  <p>Si es així, introdueix la paraula clau:</p>
  <form>
    <input type="password" name="clau" autocomplete="off" id="editPassword">
    <input type="button" value="EDITA" name="editar" id="editModalButton">
    <input type="text" value="<?php echo $_GET["articleId"] ?>" hidden name="id" id="articleId">
    <input type="button" value="CANCEL·LA" class="cancelar">
  </form>
</div>
<div id="deleteModal">
  <h3>Segur que vols esborrar l'article?</h3>
  <p>Si es així, introdueix la paraula clau:</p>
  <form action="../home/index.php" method="POST">
    <input type="password" name="clau" autocomplete="off">
    <input type="submit" value="ESBORRA" name="esborrar">
    <input type="text" value="<?php echo $_GET["articleId"] ?>" hidden name="id" id="articleId">
    <input type="button" value="CANCEL·LA" class="cancelar">
  </form>
</div>
<div id="pinModal">
  <h3>Segur que vols fixar l'article?</h3>
  <p>Si es així, introdueix la paraula clau:</p>
  <form action="../home/index.php" method="POST">
    <input type="password" name="clau" autocomplete="off" id="editPassword">
    <input type="submit" value="FIXA" name="fixar">
    <input type="text" value="<?php echo $_GET["articleId"] ?>" hidden name="id" id="articleId2">
    <input type="button" value="CANCEL·LA" class="cancelar">
  </form>
</div>
<div id="unpinModal">
  <h3>Segur que vols deixar de fixar l'article?</h3>
  <p>Si es així, introdueix la paraula clau:</p>
  <form action="../home/index.php" method="POST">
    <input type="password" name="clau" autocomplete="off">
    <input type="submit" value="DESFIXA" name="desfixar">
    <input type="text" value="<?php echo $_GET["articleId"] ?>" hidden name="id" id="articleId3">
    <input type="button" value="CANCEL·LA" class="cancelar">
  </form>
</div>
<script>
  <?php include 'script.js' ?>
</script>