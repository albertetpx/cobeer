<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articulos</title>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/z6696r59h44g3wyx8w3ys96p2334mzzttjlbl4knppmf31jg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
    <link rel="stylesheet" href="../../styles/layout.css">
    <link rel="stylesheet" href="../../styles/globals.css">
</head>

<body>

    <!--Header para el logo, menu y titulo de pagina-->
    <header id="header">
        <?php include '../../../components/header/component.php' ?>
    </header>

    <!--Main las cajas de texto y imagenes-->
    <main>
        <!-- Componente artículos -->
        <?php include '../../../components/edicioArticulo/component.php' ?>
    </main>

    <footer>
        <div>
            <?php include '../../../components/footer/component.php' ?>
        </div>
    </footer>

</body>

</html>