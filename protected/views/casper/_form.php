<?php
/* @var $this CasperController */
/* @var $model Casper */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'casper-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'colores'); ?>
		<?php echo $form->textField($model,'colores',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'colores'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Logica_idLogica'); ?>
		<?php echo $form->textField($model,'Logica_idLogica'); ?>
		<?php echo $form->error($model,'Logica_idLogica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reglas_idreglas'); ?>
		<?php echo $form->textField($model,'reglas_idreglas'); ?>
		<?php echo $form->error($model,'reglas_idreglas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->