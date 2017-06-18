<?php
/* @var $this ArchivosController */
/* @var $model Archivos */

$this->breadcrumbs=array(
	'Archivoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Archivos', 'url'=>array('index')),
	array('label'=>'Manage Archivos', 'url'=>array('admin')),
);
?>

<h1>Create Archivos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>