<?php
/* @var $this ArchivosController */
/* @var $data Archivos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idarchivos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idarchivos), array('view', 'id'=>$data->idarchivos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('archivo')); ?>:</b>
	<?php echo CHtml::encode($data->archivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estudiantes_idestudiante')); ?>:</b>
	<?php echo CHtml::encode($data->estudiantes_idestudiante); ?>
	<br />


</div>