<!DOCTYPE html>
<?php include __DIR__ . '/controller.php'; ?>  
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/layout.css">
    <link rel="stylesheet" href="../../styles/globals.css">
    <title>Cobeer</title>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
</head>

<body>  
    <div class="layout">

        <header>
            <!-- Componente header -->
            <?php include '../../../components/header/component.php' ?>
        </header>

        <main>
            <!-- Wellcome div -->
            <?php include '../../../components/wellcome/component.php' ?>
            <section>
                <!-- Componente artículos -->
                <?php include '../../../components/articlesCard/component.php' ?>
            </section>

            <!-- Componente departamentos -->
             <?php include '../../../components/departamentos/component.php' ?>

            <!-- Componente mapa -->
            <?php include '../../../components/mapa/component.php'?>
        </main>

        <footer>
            <!-- Componente footer -->
            <?php include '../../../components/footer/component.php' ?>
        </footer>

</body>

</html>