<?php
/* @var $this EstudiantesController */
/* @var $model Estudiantes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estudiantes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Los Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('class' => 'form-control'),array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('class' => 'form-control'),array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'curso'); ?>
		<?php echo $form->textField($model,'curso',array('class' => 'form-control'),array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
                <?php if(!$model->isNewRecord){?>
                    <?php echo Chtml::image(Yii::app()->request->baseUrl.'/uploads/'.$model->foto,"image", array("width"=>300))?>
                <?php }?>
                <?php echo Chtml::activeFileField($model, 'foto',array('class'=>'form-control'))?>
		<?php echo $form->error($model,'foto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bachiller'); ?>
		<?php echo $form->textField($model,'bachiller',array('class' => 'form-control'),array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'bachiller'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->