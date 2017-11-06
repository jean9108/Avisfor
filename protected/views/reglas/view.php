<?php
/* @var $this ReglasController */
/* @var $model Reglas */

$this->breadcrumbs=array(
	'Reglases'=>array('index'),
	$model->idreglas,
);

$this->menu=array(
	array('label'=>'List Reglas', 'url'=>array('index')),
	array('label'=>'Create Reglas', 'url'=>array('create')),
	array('label'=>'Update Reglas', 'url'=>array('update', 'id'=>$model->idreglas)),
	array('label'=>'Delete Reglas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idreglas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reglas', 'url'=>array('admin')),
);
?>

<h1>View Reglas #<?php echo $model->idreglas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idreglas',
		'inicio',
		'fin',
		'Logica_idLogica',
	),
)); ?>
