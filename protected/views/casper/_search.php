<?php
/* @var $this CasperController */
/* @var $model Casper */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idcasper'); ?>
		<?php echo $form->textField($model,'idcasper'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'colores'); ?>
		<?php echo $form->textField($model,'colores',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Logica_idLogica'); ?>
		<?php echo $form->textField($model,'Logica_idLogica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reglas_idreglas'); ?>
		<?php echo $form->textField($model,'reglas_idreglas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->