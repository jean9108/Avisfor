<?php
/* @var $this SistemasController */
/* @var $model Sistemas */

$this->breadcrumbs=array(
	'Sistemases'=>array('index'),
	$model->idsistemas=>array('view','id'=>$model->idsistemas),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sistemas', 'url'=>array('index')),
	array('label'=>'Create Sistemas', 'url'=>array('create')),
	array('label'=>'View Sistemas', 'url'=>array('view', 'id'=>$model->idsistemas)),
	array('label'=>'Manage Sistemas', 'url'=>array('admin')),
);
?>

<h1>Update Sistemas <?php echo $model->idsistemas; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>