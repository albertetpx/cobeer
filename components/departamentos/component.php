<?php include __DIR__ . '/controller.php'; ?>
<style>
    <?php include __DIR__ . '/template.css'; ?>
</style>

<div class="tituloDepartaments">
    <!-- <h1 class="line-1 anim-typewriter">Els nostres departaments</h1> -->
    <h1>Els nostres departaments</h1>
</div>

<div class="imagenesDepartamentos">
    <?php foreach(getDepartamentos() as $departamento => $idDepartamento):?>
        <?php error_reporting(E_ERROR | E_PARSE); ?>           
        <a href="../buscador/?departamento=<?=$idDepartamento?>">
            <div> 
                <img class ="imageDepart" src="https://i.ibb.co/wcXwzCy/Bmever-group-of-teenagers-making-a-bottle-of-beer-in-school-art-407b816b-4bd8-44b3-8b04-6d24006feab9.png" alt="">
                <h1 class="tituloDept">
                    <?=$departamento?>
                </h1> 
                <!-- <p class="descripcionDept">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat, quo.
                </p>   -->
            </div> 
        </a>
    <?php endforeach;?>
</div>

