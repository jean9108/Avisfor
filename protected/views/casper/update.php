<?php
/* @var $this CasperController */
/* @var $model Casper */

$this->breadcrumbs=array(
	'Caspers'=>array('index'),
	$model->idcasper=>array('view','id'=>$model->idcasper),
	'Update',
);

$this->menu=array(
	array('label'=>'List Casper', 'url'=>array('index')),
	array('label'=>'Create Casper', 'url'=>array('create')),
	array('label'=>'View Casper', 'url'=>array('view', 'id'=>$model->idcasper)),
	array('label'=>'Manage Casper', 'url'=>array('admin')),
);
?>

<h1>Update Casper <?php echo $model->idcasper; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>