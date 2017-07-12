<?php
/* @var $this LogicaController */
/* @var $model Logica */
$estudiante = Estudiantes::model()->find("cruge_user_iduser=:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));
$this->breadcrumbs = array(
    $estudiante->getNombresyApellidos(),
    'Simulador',
);
?>
<div class="col-sm-12 tituloP">
    <h1> Simulador</h1>
</div>

<?php $this->renderPartial('_sisfor', array('model'=>$model,
    'regla' => $regla,
    'validateRules' =>$validateRules)); ?>
