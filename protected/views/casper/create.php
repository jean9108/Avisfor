<?php
/* @var $this CasperController */
/* @var $model Casper */

$this->breadcrumbs=array(
	'Caspers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Casper', 'url'=>array('index')),
	array('label'=>'Manage Casper', 'url'=>array('admin')),
);
?>

<h1>Create Casper</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>