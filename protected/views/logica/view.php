<?php
/* @var $this LogicaController */
/* @var $model Logica */

$this->breadcrumbs=array(
	'Logicas'=>array('index'),
	$model->idLogica,
);

$this->menu=array(
	array('label'=>'List Logica', 'url'=>array('index')),
	array('label'=>'Create Logica', 'url'=>array('create')),
	array('label'=>'Update Logica', 'url'=>array('update', 'id'=>$model->idLogica)),
	array('label'=>'Delete Logica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idLogica),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Logica', 'url'=>array('admin')),
);
?>

<h1>View Logica #<?php echo $model->idLogica; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idLogica',
		'axioma',
		'conjetura',
		'estudiantes_idestudiantes',
	),
)); ?>
