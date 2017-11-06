<?php
/* @var $this SisforController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sisfors',
);

$this->menu=array(
	array('label'=>'Create Sisfor', 'url'=>array('create')),
	array('label'=>'Manage Sisfor', 'url'=>array('admin')),
);
?>

<h1>Sisfors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
