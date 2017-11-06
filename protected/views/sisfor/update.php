<?php
/* @var $this SisforController */
/* @var $model Sisfor */

$this->breadcrumbs=array(
	'Sisfors'=>array('index'),
	$model->idSisfor=>array('view','id'=>$model->idSisfor),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sisfor', 'url'=>array('index')),
	array('label'=>'Create Sisfor', 'url'=>array('create')),
	array('label'=>'View Sisfor', 'url'=>array('view', 'id'=>$model->idSisfor)),
	array('label'=>'Manage Sisfor', 'url'=>array('admin')),
);
?>

<h1>Update Sisfor <?php echo $model->idSisfor; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>