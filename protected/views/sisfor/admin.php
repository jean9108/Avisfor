<?php
/* @var $this SisforController */
/* @var $model Sisfor */

$this->breadcrumbs=array(
	'Sisfors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Sisfor', 'url'=>array('index')),
	array('label'=>'Create Sisfor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sisfor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sisfors</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sisfor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idSisfor',
		'axioma',
		'conjetura',
		'Regla1',
		'Regla2',
		'Regla3',
		/*
		'Regla4',
		'Regla5',
		'Regla6',
		'Regla7',
		'Regla8',
		'Regla9',
		'Regla10',
		'Regla11',
		'Regla12',
		'Regla13',
		'estudiantes_idestudiante',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
