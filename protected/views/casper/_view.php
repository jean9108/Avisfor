<?php
/* @var $this CasperController */
/* @var $data Casper */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcasper')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcasper), array('view', 'id'=>$data->idcasper)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colores')); ?>:</b>
	<?php echo CHtml::encode($data->colores); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Logica_idLogica')); ?>:</b>
	<?php echo CHtml::encode($data->Logica_idLogica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reglas_idreglas')); ?>:</b>
	<?php echo CHtml::encode($data->reglas_idreglas); ?>
	<br />


</div>