<?php
/* @var $this LogicaController */
/* @var $model Logica */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idLogica'); ?>
		<?php echo $form->textField($model,'idLogica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'axioma'); ?>
		<?php echo $form->textField($model,'axioma',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conjetura'); ?>
		<?php echo $form->textField($model,'conjetura',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estudiantes_idestudiantes'); ?>
		<?php echo $form->textField($model,'estudiantes_idestudiantes'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->