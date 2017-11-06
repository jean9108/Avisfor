<?php
/* @var $this LogicaController */
/* @var $data Logica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idLogica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idLogica), array('view', 'id'=>$data->idLogica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('axioma')); ?>:</b>
	<?php echo CHtml::encode($data->axioma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conjetura')); ?>:</b>
	<?php echo CHtml::encode($data->conjetura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estudiantes_idestudiantes')); ?>:</b>
	<?php echo CHtml::encode($data->estudiantes_idestudiantes); ?>
	<br />


</div>