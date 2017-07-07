<?php
/* @var $this LogicaController */
/* @var $model Logica */
/* @var $form CActiveForm */
?>
<?php $row_id = "regla-" . $key ?>
<div class="form" id="<?php echo $row_id ?>">

<?php // $form=$this->beginWidget('CActiveForm', array(
//	'id'=>'logica-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
//	'enableAjaxValidation'=>false,
//)); ?>
    
    
     
    <?php
        echo $form->hiddenField($model, "[$key]Logica_idLogica");
        echo $form->updateTypeField($model, $key, "Logica_idLogica", array('key' => $key));
    ?>
    
    <div class="row">
		<?php echo $form->labelEx($model,"[$key]inicio"); ?>
		<?php echo $form->textField($model,"[$key]inicio",array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,"[$key]inicio"); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,"[$key]fin"); ?>
		<?php echo $form->textField($model,"[$key]fin",array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,"[$key]fin"); ?>
        </div>
        
    <div class="row">
        <?php 
           echo $form->deleteRowButton($row_id,$key);
        ?>
    </div>

</div><!-- form -->