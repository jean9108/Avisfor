<?php
/* @var $this CasperController */
/* @var $model Casper */

$this->breadcrumbs=array(
	'Caspers'=>array('index'),
	$model->idcasper,
);

$this->menu=array(
	array('label'=>'List Casper', 'url'=>array('index')),
	array('label'=>'Create Casper', 'url'=>array('create')),
	array('label'=>'Update Casper', 'url'=>array('update', 'id'=>$model->idcasper)),
	array('label'=>'Delete Casper', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcasper),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Casper', 'url'=>array('admin')),
);
?>

<h1>View Casper #<?php echo $model->idcasper; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcasper',
		'colores',
		'Logica_idLogica',
		'reglas_idreglas',
	),
)); ?>
