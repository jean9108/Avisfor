<?php
/* @var $this SisforController */
/* @var $model Sisfor */

$this->breadcrumbs=array(
	'Sisfors'=>array('index'),
	$model->idSisfor,
);

$this->menu=array(
	array('label'=>'List Sisfor', 'url'=>array('index')),
	array('label'=>'Create Sisfor', 'url'=>array('create')),
	array('label'=>'Update Sisfor', 'url'=>array('update', 'id'=>$model->idSisfor)),
	array('label'=>'Delete Sisfor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSisfor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sisfor', 'url'=>array('admin')),
);
?>

<h1>View Sisfor #<?php echo $model->idSisfor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSisfor',
		'axioma',
		'conjetura',
		'Regla1',
		'Regla2',
		'Regla3',
		'Regla4',
		'Regla5',
		'Regla6',
		'Regla7',
		'Regla8',
		'Regla9',
		'Regla10',
		'Regla11',
		'Regla12',
		'Regla13',
		'estudiantes_idestudiante',
	),
)); ?>
