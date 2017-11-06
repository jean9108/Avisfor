<?php
/* @var $this EstudiantesController */
/* @var $model Estudiantes */

$this->breadcrumbs=array(
	$model->getNombresyApellidos() ,
	'Modificar Perfil',
);

?>

<div class="col-sm-12 tituloP">
    <h1>Editar Perfil</h1>
</div>

<div class="col-sm-3"></div>
<div class="col-sm-6">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
<div class="col-sm-3"></div>