<?php
/* @var $this SistemasController */
/* @var $model Sistemas */

$this->breadcrumbs=array(
	'Sistemases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sistemas', 'url'=>array('index')),
	array('label'=>'Manage Sistemas', 'url'=>array('admin')),
);
?>

<h1>Create Sistemas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>