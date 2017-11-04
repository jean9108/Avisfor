<?php
/* @var $this CasperController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Caspers',
);

$this->menu=array(
	array('label'=>'Create Casper', 'url'=>array('create')),
	array('label'=>'Manage Casper', 'url'=>array('admin')),
);
?>

<h1>Caspers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
