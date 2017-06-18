<?php
/* @var $this SistemasController */
/* @var $model Sistemas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sistemas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idsistemas'); ?>
		<?php echo $form->textField($model,'idsistemas'); ?>
		<?php echo $form->error($model,'idsistemas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sistema'); ?>
		<?php echo $form->textField($model,'sistema',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'sistema'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estudiantes_idestudiante'); ?>
		<?php echo $form->textField($model,'estudiantes_idestudiante'); ?>
		<?php echo $form->error($model,'estudiantes_idestudiante'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->