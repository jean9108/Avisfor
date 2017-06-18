<?php
/* @var $this ArchivosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Archivoses',
);

$this->menu=array(
	array('label'=>'Create Archivos', 'url'=>array('create')),
	array('label'=>'Manage Archivos', 'url'=>array('admin')),
);
?>

<h1>Archivoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
