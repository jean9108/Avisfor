<?php
/* @var $this SistemasController */
/* @var $model Sistemas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idsistemas'); ?>
		<?php echo $form->textField($model,'idsistemas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sistema'); ?>
		<?php echo $form->textField($model,'sistema',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estudiantes_idestudiante'); ?>
		<?php echo $form->textField($model,'estudiantes_idestudiante'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->