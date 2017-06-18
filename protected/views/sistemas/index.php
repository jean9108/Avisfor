<?php
/* @var $this SistemasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sistemases',
);

$this->menu=array(
	array('label'=>'Create Sistemas', 'url'=>array('create')),
	array('label'=>'Manage Sistemas', 'url'=>array('admin')),
);
?>

<h1>Sistemases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
