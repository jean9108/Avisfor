<?php
/* @var $this LogicaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Logicas',
);

$this->menu=array(
	array('label'=>'Create Logica', 'url'=>array('create')),
	array('label'=>'Manage Logica', 'url'=>array('admin')),
);
?>

<h1>Logicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
