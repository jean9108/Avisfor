<?php
//    trae el nombre del estudiante mediante la consulta de la tabla Estudiantes
$estudiante = Estudiantes::model()->find("cruge_user_iduser=:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));
$this->breadcrumbs = array(
    $estudiante->getNombresyApellidos(),
    'Mis Sistemas Formales',
);
?>

<div class="col-sm-12 tituloP">    
    <h1><i class="fa fa-book" aria-hidden="true"></i> Mis Sistemas Formales</h1>
</div>

<!--Botones de selección para cada acción--> 
<?php if (Yii::app()->user->checkAccess('tpro') && !Yii::app()->user->isSuperAdmin) { ?>
    <?php echo CHtml::link('Crear Sistema Formal', array('/sistemas/create'), array('class' => 'btn btn-success')); ?>
    <?php // echo Chtml::link('Descargar Programa', array('//'), array)?>
    <a href="<?php echo Yii::app()->baseUrl; ?>/programa/sisfor.zip" download="sisfor.zip">Descargar</a>
<?php } ?>
<?php 
system("sisfor.EXE"); 
?> 