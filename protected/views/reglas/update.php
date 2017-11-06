<?php
/* @var $this ReglasController */
/* @var $model Reglas */

$this->breadcrumbs=array(
	'Reglases'=>array('index'),
	$model->idreglas=>array('view','id'=>$model->idreglas),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reglas', 'url'=>array('index')),
	array('label'=>'Create Reglas', 'url'=>array('create')),
	array('label'=>'View Reglas', 'url'=>array('view', 'id'=>$model->idreglas)),
	array('label'=>'Manage Reglas', 'url'=>array('admin')),
);
?>

<h1>Update Reglas <?php echo $model->idreglas; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>