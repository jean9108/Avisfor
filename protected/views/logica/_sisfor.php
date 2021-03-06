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
            <?php echo CHtml::submitButton('Nº de Letras', array('name' => 'button1', 'class' => 'btn btn-default')); ?>
        </div>
        <div class="row col-sm-3">
            <?php echo $form->textField($model, 'letras', array('class' => 'form-control')) ?>
        </div>
        <div class="row col-sm-3">
            <?php echo $form->textField($model, 'resultado', array('class' => 'form-control', 'readonly' => true)) ?>
        </div>
    </div>
    <div class="row col-sm-12">
        <div class="row col-sm-5">
            <?php echo $form->labelEx($model, 'conjetura'); ?>
            <?php echo $form->textArea($model, 'conjetura', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'conjetura'); ?>
        </div>

        <div class="row col-sm-7">
            <div class="row col-sm-12">
                <label>Escriba el Axioma. Aqui se registra la Derivación</label>
                <?php echo $form->textField($model, 'derivacion', array('class' => 'form-control')) ?>
                <?php echo $form->error($model, 'derivacion'); ?>
            </div>
            <div class="row col-sm-12">
                <select class="form-control">
                    <option value="">Selecione uno...</option>
                    <?php foreach ($model->prueba as $row): ?>

                        <?php echo "<option value = " . $row . " >" . $row . "</option>" ?>
                    <?php endforeach; ?>
                </select>

            </div>

        </div>
    </div>

    <div class="row col-sm-5 solucion" id ="solucion">
        <?php $cadena = array(); ?>
        <?php $cadena2 = array(); ?>
        <?php $cadena3 = array(); ?>
        <?php if (count($model->solucion) > 0) { ?>

            <?php foreach ($model->solucion as $value): ?>
                <?php
                $cont = 0;
                $p = '';
                $color = '';
                $a = '';
                $var = array_keys($value);

                foreach ($var as $row):
                    $pru = (string) $value[$row];
                    if ($row == 'regla') {
                        $p .= '<span> Regla ' . $pru . ' </span> ';
                    } else if ($cont == 1) {
                        $p .= '<span style="color:#88C425">' . $row . '</span>';
                        $color .= '<span style="color:#88C425">' . $value[$row] . '</span>';
                    } else if ($cont == 2) {
                        $p .= '<span style="color:blue">' . $row . '</span>';
                        $color .= '<span style="color:blue">' . $value[$row] . '</span>';
                    } else if ($cont == 3) {
                        $p .= '<span style="color:red">' . $row . '</span>';
                        $color .= '<span style="color:red">' . $value[$row] . '</span>';
                    } else if ($cont == 4) {
                        $p .= '<span style="color:black">' . $row . '</span>';
                        $color .= '<span style="color:black">' . $value[$row] . '</span>';
                    } else if ($cont == 5) {
                        $p .= '<span style="color:#F8CA00">' . $row . '</span>';
                        $color .= '<span style="color:#F8CA00">' . $value[$row] . '</span>';
                    }
                    if ($cont > 0)
                        $a .= $value[$row];
                    if ($cont == 5)
                        $cont = 0;
                    $cont += 1;
                endforeach;
                ?>
                <?php array_push($cadena, $p) ?>
                <?php array_push($cadena2, $a) ?>
                <?php array_push($model->cadena3, $color); ?>
            <?php endforeach; ?>

            <?php for ($i = 0; $i < count($cadena2); $i++): ?>
                <p style = "text-align: center"><?php echo '=' . chr(60); ?><?php echo $cadena[$i] ?><?php echo chr(62); ?></p>
                Cambios:
                <p style = "text-align: center"><?php echo $model->cadena3[$i] ?></p>
                Respuesta:
                <?php echo CHtml::submitButton($cadena2[$i], array('name' => 'button3', 'class' => 'btn btn-link form-control')); ?>
                <br/>

            <?php endfor; ?>
        <?php } else { ?>
            <?php
            if ($model->aviso == 1) {
                $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                    'id' => 'mydialog',
                    // additional javascript options for the dialog plugin
                    'options' => array(
                        'title' => 'Aplicación de Regla',
                        'autoOpen' => true,
                        'buttons' => array(
                            array('text' => 'Close', 'click' => 'js:function(){$(this).dialog("close");}'),
                        ),
                    ),
                ));

                echo 'No se puede aplicar esta regla';

                $this->endWidget('zii.widgets.jui.CJuiDialog');
            }
            ?>
        <?php } ?>    

        <?php
        if ($model->axioma == $model->conjetura) {
            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                'id' => 'mydialog',
                // additional javascript options for the dialog plugin
                'options' => array(
                    'title' => 'Simulación Completada',
                    'autoOpen' => true,
                    'buttons' => array(
                        array('text' => 'Close', 'click' => 'js:function(){$(this).dialog("close");}'),
                    ),
                ),
            ));

            echo 'Simulación completada';

            $this->endWidget('zii.widgets.jui.CJuiDialog');
        }
        ?>                
    </div>

    <div class="row col-sm-7">
        <?php $model2 = Reglas::model()->findAll("Logica_idLogica=:Logica_idLogica", array(':Logica_idLogica' => $model->idLogica)) ?>

        <table class="linear" cellspacing = "0">
            <?php $aux = 1; ?>
            <?php foreach ($model2 as $row): ?>
                <tr>
                    <td id = "regla_apl" class="form-control"><?php echo $row['inicio'] ?></td>
                    <td><button type="button" class = "btn btn-default form-control">  -->  </button></td>
                    <td   id = "regla_apl" class="form-control"><?php echo $row['fin'] ?></td>


                    <td><?php echo CHtml::submitButton('Regla ' . $aux, array('name' => 'button2', 'class' => 'btn btn-success')); ?></td>

                </tr>
                <?php $aux += 1; ?>
            <?php endforeach; ?>

        </table>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="text-align: right">
         <?php echo CHtml::link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Imprimir',array("generarpdf", 'id'=>$model->idLogica),array("target"=>"_blank", "class" => "btn btn-danger")); ?>
        
    </div>
   

    <div class="col-sm-12 tituloP">
        <h1> Actualizar Reglas </h1>
    </div>

    <div class="col-sm-12 table-responsive">
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
                       <button type="button" class = "btn btn-default">  -->  </button>

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
    <script>
        $('#pre-selected-options').multiSelect();

        $('[data-toggle="popover"]').popover();

    </script>
</div><!-- form -->
