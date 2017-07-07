<?php
/* @var $this LogicaController */
/* @var $model Logica */

$this->breadcrumbs=array(
	'Logicas'=>array('index'),
	$model->idLogica=>array('view','id'=>$model->idLogica),
	'Update',
);

$this->menu=array(
	array('label'=>'List Logica', 'url'=>array('index')),
	array('label'=>'Create Logica', 'url'=>array('create')),
	array('label'=>'View Logica', 'url'=>array('view', 'id'=>$model->idLogica)),
	array('label'=>'Manage Logica', 'url'=>array('admin')),
);
?>

<h1>Update Logica <?php echo $model->idLogica; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>