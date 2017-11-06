<?php
/* @var $this SisforController */
/* @var $data Sisfor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSisfor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSisfor), array('view', 'id'=>$data->idSisfor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('axioma')); ?>:</b>
	<?php echo CHtml::encode($data->axioma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conjetura')); ?>:</b>
	<?php echo CHtml::encode($data->conjetura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla1')); ?>:</b>
	<?php echo CHtml::encode($data->Regla1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla2')); ?>:</b>
	<?php echo CHtml::encode($data->Regla2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla3')); ?>:</b>
	<?php echo CHtml::encode($data->Regla3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla4')); ?>:</b>
	<?php echo CHtml::encode($data->Regla4); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla5')); ?>:</b>
	<?php echo CHtml::encode($data->Regla5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla6')); ?>:</b>
	<?php echo CHtml::encode($data->Regla6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla7')); ?>:</b>
	<?php echo CHtml::encode($data->Regla7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla8')); ?>:</b>
	<?php echo CHtml::encode($data->Regla8); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla9')); ?>:</b>
	<?php echo CHtml::encode($data->Regla9); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla10')); ?>:</b>
	<?php echo CHtml::encode($data->Regla10); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla11')); ?>:</b>
	<?php echo CHtml::encode($data->Regla11); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla12')); ?>:</b>
	<?php echo CHtml::encode($data->Regla12); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regla13')); ?>:</b>
	<?php echo CHtml::encode($data->Regla13); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estudiantes_idestudiante')); ?>:</b>
	<?php echo CHtml::encode($data->estudiantes_idestudiante); ?>
	<br />

	*/ ?>

</div>