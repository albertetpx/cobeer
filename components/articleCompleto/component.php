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
      <button class="arrow prev">⇦</button>
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
      <button class="arrow next">⇨</button>
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

      <div class="user flex p-1">

        <div class="avatar"></div>
        <div class="user-detail">
          <h2 class="name">
            <?= $articulo["autor"]; ?>
          </h2>
        </div>
      </div>
    </div>
  </div>
</article>
<div id="deleteModal">
  <h3>Segur que vols esborrar l'article?</h3>
  <p>Si es així, introdueix la paraula clau:</p>
  <form action="../home/index.php" method="POST">
    <input type="text" name="clau" autocomplete="off">
    <input type="submit" value="ESBORRA" name="enviar">
    <input type="text" value="<?php echo $_GET["articleId"] ?>" hidden name="id">
  </form>
</div>
<script>
  /* etiqueta las imágenes pra poder rastrearlas, solo por conveniencia */
  let i = 1;
  for (let li of carousel.querySelectorAll('li')) {
    li.style.position = 'relative';
    li.insertAdjacentHTML('beforeend', `<span style="position:absolute;left:0;top:0">${i}</span>`);
    i++;
  }

  /* configuración */
  let width = 400; // ancho de las imágenes
  let count = 1; // conteo de las imágenes visibles

  let list = carousel.querySelector('ul');
  let listElems = carousel.querySelectorAll('li');

  let position = 0; // posición del desplazamiento del carrete

  carousel.querySelector('.prev').onclick = function() {
    // desplazamiento izquierdo
    position += width * count;
    // no podemos mover demasiado a la izquierda, se acaban las imágenes
    position = Math.min(position, 0)
    list.style.marginLeft = position + 'px';
  };

  carousel.querySelector('.next').onclick = function() {
    // desplazamiento derecho
    position -= width * count;
    // solo se puede desplazar el carrete de imágenes (longitud total de la cinta - conteo visibles)
    position = Math.max(position, -width * (listElems.length - count));
    list.style.marginLeft = position + 'px';
  };

  window.onload = function() {
    let deleteButton = document.getElementsByClassName('avatar')[0];
    deleteButton.addEventListener('click', deleteArticle);
  }

  function deleteArticle() {
    document.getElementById("deleteModal").style.display = "block";
  }
</script>