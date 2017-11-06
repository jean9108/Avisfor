<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div class="col-sm-12 titulo">
    <h1>
        Equipo de Trabajo
    </h1>
</div>

<div class="row">
    <div class="col-sm-6 int1">
        <p><strong>Raul Chaparro</strong></p>
        <a href="#demo" data-toggle = "collapse">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/integrante1.png" alt="Integrante" class="img-circle person"/>
        </a>
        <div id = "demo" class="collapse">
            <p>Profesor Ingeniería de Sistemas</p>
            <p>Director de proyecto de grado AVIAL</p>
            <p>Ambiente visual para el aprendizaje de </br> los conceptos básicos  asociados a <br /> Los sistemas formales.</p>
        </div>
    </div> 

    <div class="col-sm-6 int2">
        <p><strong>Joana Garcia</strong></p>
        <a href="#demo2" data-toggle ="collapse">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/integrante2.png" alt="Integrante" class="img-circle person"/>
        </a>
        <div id = "demo2" class="collapse">
            <p>Estudiante de Ingeniería de Sistemas</p>
            <p>Integrante del proyecto AVIAL</p>
            <p>Proyecto de grado 1</p>
        </div>
    </div>
</div>
