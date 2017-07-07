<?php
/* @var $this LogicaController */
/* @var $model Logica */

$this->breadcrumbs = array(
    'Logicas' => array('index'),
    'Create',
);
?>

<?php
$form = $this->beginWidget('DynamicTabularForm', array(
    'defaultRowView' => '_form',
        ));
?>

<div class = "col-sm-12 tituloP">
    <h1>Primer Paso</h1>
</div>
<?php echo $form->errorSummary($model); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <?php echo $form->labelEx($model, 'axioma'); ?>
    <?php echo $form->textField($model, 'axioma', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'axioma'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'conjetura'); ?>
    <?php echo $form->textField($model, 'conjetura', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'conjetura'); ?>
</div>

<div class = "col-sm-12 tituloP">
    <h1>Reglas</h1>
</div>

<?php
/**
 * this is the main feature!!
 */
echo $form->rowForm($reglas);

echo CHtml::submitButton('create');

$this->endWidget();
?>
