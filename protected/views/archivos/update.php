<?php
/* @var $this ArchivosController */
/* @var $model Archivos */

$this->breadcrumbs=array(
	'Archivoses'=>array('index'),
	$model->idarchivos=>array('view','id'=>$model->idarchivos),
	'Update',
);

$this->menu=array(
	array('label'=>'List Archivos', 'url'=>array('index')),
	array('label'=>'Create Archivos', 'url'=>array('create')),
	array('label'=>'View Archivos', 'url'=>array('view', 'id'=>$model->idarchivos)),
	array('label'=>'Manage Archivos', 'url'=>array('admin')),
);
?>

<h1>Update Archivos <?php echo $model->idarchivos; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>