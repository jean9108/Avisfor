<?php
/* @var $this ReglasController */
/* @var $model Reglas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php //$form=$this->beginWidget('CActiveForm', array(
	//'id'=>'reglas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>false,
//)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fin'); ?>
		<?php echo $form->textField($model,'fin',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Logica_idLogica'); ?>
		<?php echo $form->textField($model,'Logica_idLogica'); ?>
		<?php echo $form->error($model,'Logica_idLogica'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->