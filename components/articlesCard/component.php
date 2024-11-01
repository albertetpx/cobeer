<style>
    <?php include __DIR__ . '/template.css';
    ?>
</style>
<?php include __DIR__ . '/controller.php'; ?>

<div class="tituloArtDest">
    <h1>Darrers articles publicats</h1>
</div>
<div class="articlesCardContainer" id="articleContainer">
    <input type="text" value="<?php echo $_GET["page"] ?? '1' ?>" hidden name="page" id="page">
    <?php getArticulos() ?>
</div>
<div class="articleNav">
    <div>
        <div class="prevButton"></div>
        <h4>Articles anteriors</h4>
    </div>
    <div>
        <div class="nextButton"></div>
        <h4>Articles següents</h4>
    </div>
</div>
<script>
    <?php include 'script.js' ?>
</script>