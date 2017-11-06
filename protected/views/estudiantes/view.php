<?php
/* @var $this EstudiantesController */
/* @var $model Estudiantes */

$this->breadcrumbs = array(
    'Estudiantes' => array('index'),
    $model->nombresyApellidos,
);
?>
<div class="col-sm-12 tituloP">
    <h1><i class="fa fa-user" aria-hidden="true"></i> Mi perfil</h1>
</div>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'nombresyApellidos',
        'curso',
        array(
            'name'=>'Foto', 
                    'type' => 'raw',
                    'value'=>CHtml::image(Yii::app()->baseUrl.'/uploads/'.$model->foto,'imagen',array('width'=>200)), 
        ),
        'bachiller',
    ),
));
?>
<div class="col-sm-12 actualizar">
    <?php echo CHtml::link('Editar Perfil', array('/estudiantes/update/'.$model->idestudiante),array('class'=>'btn btn-success')); ?>
</div>


