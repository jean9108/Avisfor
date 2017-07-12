<?php
/* @var $this LogicaController */
/* @var $model Logica */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'logica-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <!--<p class="note">Los Campos con <span class="required">*</span> son requeridos.</p>-->

    <?php echo $form->errorSummary(array_merge(array($model), $validateRules)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row col-sm-8">
        <label>Escriba el Axioma !! No deje espacios en blanco" ...Derivación actual</label>
        <?php echo $form->textArea($model, 'axioma', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'axioma'); ?>
    </div>
    
    <div class="row col-sm-4">
        <div class = "row col-sm-6">
            <?php echo CHtml::submitButton('Nº de Letras', array('name' => 'button1', 'class'=>'btn btn-default')); ?>
        </div>
        <div class="row col-sm-3">
            <?php echo $form->textField($model, 'letras', array('class'=>'form-control'))?>
        </div>
        <div class="row col-sm-3">
            <?php echo $form->textField($model, 'resultado', array('class'=>'form-control'))?>
        </div>
    </div>

    <div class="row col-sm-5">
        <?php echo $form->labelEx($model, 'conjetura'); ?>
        <?php echo $form->textField($model, 'conjetura', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'conjetura'); ?>
    </div>
    <div class="col-sm-7 table-responsive">
        <table class="linear" cellspacing ="0">
            <?php
            $reglaFormConfig = array(
                'elements' => array(
                    'inicio' => array(
                        'type' => 'text',
                        'maxlength' => 255,
                        'class' => 'form-control',
                    ),
                    '<td class="mmf_cell">
                       <button type="button" class = "btn btn-default">  -->  </button

                    </td>',
                    'fin' => array(
                        'type' => 'text',
                        'maxlength' => 255,
                        'class' => 'form-control',
                    )
                )
            );

            echo CHtml::script('function alertIds(newElem,sourceElem){alert(newElem.attr("id"));alert(sourceElem.attr("id"));}');
            $this->widget('ext.multimodelform.MultiModelForm', array(
                'id' => 'idreglas',
                'formConfig' => $reglaFormConfig,
                'model' => $regla,
                'validatedItems' => $validateRules,
                'data' => empty($validateRules) ? $regla->findAll(array(
                            'condition' => 'Logica_idLogica=:Logica_idLogica',
                            'params' => array(':Logica_idLogica' => $model->idLogica),
                            'order' => 'idReglas',
                        )) : null,
                'sortAttribute' => 'idreglas',
                'hideCopyTemplate' => true,
                'clearInputs' => false,
                'tableView' => true,
                'showAddItemOnError' => false,
                'fieldsetWrapper' => array('tag' => 'div',
                    'htmlOptions' => array('class' => 'view', 'style' => 'position:relative;background:#EFEFEF;')
                ),
                'removeLinkWrapper' => array('tag' => 'div',
                    'htmlOptions' => array('style' => 'position:absolute; top:1em; right:1em;')
                ),
            ));
            ?>
        </table>
    </div>

    <div class="row buttons col-sm-12">
        <?php echo CHtml::submitButton('Guardar', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->