<?php
/* @var $this EstudiantesController */
/* @var $data Estudiantes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idestudiante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idestudiante), array('view', 'id'=>$data->idestudiante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($data->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curso')); ?>:</b>
	<?php echo CHtml::encode($data->curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bachiller')); ?>:</b>
	<?php echo CHtml::encode($data->bachiller); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cruge_user_iduser')); ?>:</b>
	<?php echo CHtml::encode($data->cruge_user_iduser); ?>
	<br />


</div>