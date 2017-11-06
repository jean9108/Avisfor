<?php
/* @var $this SisforController */
/* @var $model Sisfor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idSisfor'); ?>
		<?php echo $form->textField($model,'idSisfor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'axioma'); ?>
		<?php echo $form->textField($model,'axioma',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conjetura'); ?>
		<?php echo $form->textField($model,'conjetura',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla1'); ?>
		<?php echo $form->textField($model,'Regla1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla2'); ?>
		<?php echo $form->textField($model,'Regla2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla3'); ?>
		<?php echo $form->textField($model,'Regla3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla4'); ?>
		<?php echo $form->textField($model,'Regla4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla5'); ?>
		<?php echo $form->textField($model,'Regla5',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla6'); ?>
		<?php echo $form->textField($model,'Regla6',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla7'); ?>
		<?php echo $form->textField($model,'Regla7',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla8'); ?>
		<?php echo $form->textField($model,'Regla8',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla9'); ?>
		<?php echo $form->textField($model,'Regla9',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla10'); ?>
		<?php echo $form->textField($model,'Regla10',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla11'); ?>
		<?php echo $form->textField($model,'Regla11',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla12'); ?>
		<?php echo $form->textField($model,'Regla12',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Regla13'); ?>
		<?php echo $form->textField($model,'Regla13',array('size'=>60,'maxlength'=>255)); ?>
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