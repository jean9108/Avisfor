<?php
/* @var $this ArchivosController */
/* @var $model Archivos */

$this->breadcrumbs=array(
	'Archivoses'=>array('index'),
	$model->idarchivos,
);

$this->menu=array(
	array('label'=>'List Archivos', 'url'=>array('index')),
	array('label'=>'Create Archivos', 'url'=>array('create')),
	array('label'=>'Update Archivos', 'url'=>array('update', 'id'=>$model->idarchivos)),
	array('label'=>'Delete Archivos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idarchivos),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Archivos', 'url'=>array('admin')),
);
?>

<h1>View Archivos #<?php echo $model->idarchivos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idarchivos',
		'archivo',
		'estudiantes_idestudiante',
	),
)); ?>
