<?php
/* @var $this ReglasController */
/* @var $model Reglas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idreglas'); ?>
		<?php echo $form->textField($model,'idreglas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fin'); ?>
		<?php echo $form->textField($model,'fin',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Logica_idLogica'); ?>
		<?php echo $form->textField($model,'Logica_idLogica'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->