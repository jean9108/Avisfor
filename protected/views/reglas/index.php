<?php
/* @var $this ReglasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reglases',
);

$this->menu=array(
	array('label'=>'Create Reglas', 'url'=>array('create')),
	array('label'=>'Manage Reglas', 'url'=>array('admin')),
);
?>

<h1>Reglases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
