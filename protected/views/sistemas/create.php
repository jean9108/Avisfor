<?php
/* @var $this SistemasController */
/* @var $model Sistemas */
$estudiante = Estudiantes::model()->find("cruge_user_iduser=:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));
$this->breadcrumbs=array(
	'Sistemas Formales',
	$estudiante->getNombresyApellidos(),
	'Guardar Sistema',
);
?>
<div  class="col-sm-12 tituloP">
    <h1><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Mi Sistema Formal</h1>
</div>

<div class="col-sm-3"></div>
<div class="col-sm-6">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
<div class="col-sm-3"></div>