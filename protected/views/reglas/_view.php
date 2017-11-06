<?php
/* @var $this ReglasController */
/* @var $data Reglas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idreglas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idreglas), array('view', 'id'=>$data->idreglas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inicio')); ?>:</b>
	<?php echo CHtml::encode($data->inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fin')); ?>:</b>
	<?php echo CHtml::encode($data->fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Logica_idLogica')); ?>:</b>
	<?php echo CHtml::encode($data->Logica_idLogica); ?>
	<br />


</div>