<?php
/* @var $this LogicaController */
/* @var $model Logica */
$estudiante = Estudiantes::model()->find("cruge_user_iduser=:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));
$this->breadcrumbs = array(
    $estudiante->getNombresyApellidos(),
    'Lógica',
);
?>

<div class="col-sm-12 tituloP">
    <h1>Axioma Conjetura y Reglas</h1>
</div>

<div class="col-sm-3"></div>

<div class="col-sm-6">
    <?php
    $this->renderPartial('_form', array('model' => $model,
        'regla' => $regla,
        'validateRules' => $validateRules));
    ?>
</div>
<div class="col-sm-3"></div>