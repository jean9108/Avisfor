<?php
/* @var $this ReglasController */
/* @var $model Reglas */

$this->breadcrumbs=array(
	'Reglases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reglas', 'url'=>array('index')),
	array('label'=>'Manage Reglas', 'url'=>array('admin')),
);
?>

<h1>Create Reglas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>