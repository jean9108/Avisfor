<?php
/* @var $this SisforController */
/* @var $model Sisfor */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sisfor-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row col-sm-8">
        <label>Escriba el Axioma  !! No deje espacios en blanco"  ...Derivación actual</label>
        <?php echo $form->textArea($model, 'axioma', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'axioma'); ?>
    </div>


    <div class="row col-sm-4">
         <div class = "row col-sm-6">
            <input type="button" id="boton" value="Nº de Letras" class="btn btn-default">
            <?php //echo CHtml::link('Nº de Letras', array('sisfor/contarLetras'), array('class' => 'btn btn-default')); ?>
        </div> 
        <div class="row col-sm-3"> 
            <input type="text" id="texto" checked="btn btn-default" class="form-control">
        </div>

        <div class="row col-sm-3"> 
            <div id="caja"></div>
        </div>
    </div>

    <div class="row col-sm-5">
        <?php echo $form->labelEx($model, 'conjetura'); ?>
        <?php echo $form->textArea($model, 'conjetura', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'conjetura'); ?>
    </div>

    <div class="row col-sm-7">
        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'esAxioma'); ?>
            <?php echo $form->textField($model, 'esAxioma', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'esAxioma'); ?>
        </div>
        <div class="row col-sm-12">
            <select class="form-control" id="sel1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>
    </div>

    <div class="row col-sm-5">
        <select multiple class="form-control" id="sel2">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>

    <div class="row col-sm-7">
        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla1'); ?>
            <?php echo $form->textField($model, 'Regla1', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla1'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla2'); ?>
            <?php echo $form->textField($model, 'Regla2', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla2'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla3'); ?>
            <?php echo $form->textField($model, 'Regla3', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla3'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla4'); ?>
            <?php echo $form->textField($model, 'Regla4', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla4'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla5'); ?>
            <?php echo $form->textField($model, 'Regla5', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla5'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla6'); ?>
            <?php echo $form->textField($model, 'Regla6', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla6'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla7'); ?>
            <?php echo $form->textField($model, 'Regla7', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla7'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla8'); ?>
            <?php echo $form->textField($model, 'Regla8', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla8'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla9'); ?>
            <?php echo $form->textField($model, 'Regla9', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla9'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla10'); ?>
            <?php echo $form->textField($model, 'Regla10', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla10'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla11'); ?>
            <?php echo $form->textField($model, 'Regla11', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla11'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla12'); ?>
            <?php echo $form->textField($model, 'Regla12', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla12'); ?>
        </div>

        <div class="row col-sm-12">
            <?php echo $form->labelEx($model, 'Regla13'); ?>
            <?php echo $form->textField($model, 'Regla13', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'Regla13'); ?>
        </div>
    </div>

    <div class="row col-sm-12 buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->



<script type="text/javascript">
    $(document).ready(function () {
        $(":button#boton").click(function () {
                 $("#caja").html("<p style = 'border:1px solid #ccc' class = 'form-control'>" + $(":text#texto").val().length + "</p>");
        });
    });
</script>