<?php
/* @var $this SistemasController */
/* @var $model Sistemas */

$this->breadcrumbs=array(
	'Sistemases'=>array('index'),
	$model->idsistemas,
);

$this->menu=array(
	array('label'=>'List Sistemas', 'url'=>array('index')),
	array('label'=>'Create Sistemas', 'url'=>array('create')),
	array('label'=>'Update Sistemas', 'url'=>array('update', 'id'=>$model->idsistemas)),
	array('label'=>'Delete Sistemas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idsistemas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sistemas', 'url'=>array('admin')),
);
?>

<h1>View Sistemas #<?php echo $model->idsistemas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idsistemas',
		'sistema',
		'estudiantes_idestudiante',
	),
)); ?>
