<?php
/* @var $this SistemasController */
/* @var $data Sistemas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsistemas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idsistemas), array('view', 'id'=>$data->idsistemas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sistema')); ?>:</b>
	<?php echo CHtml::encode($data->sistema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estudiantes_idestudiante')); ?>:</b>
	<?php echo CHtml::encode($data->estudiantes_idestudiante); ?>
	<br />


</div>