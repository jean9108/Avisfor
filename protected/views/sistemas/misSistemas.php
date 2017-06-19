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
<div class = "col-sm-12" onload="launchCalc()">
	<?php if (Yii::app()->user->checkAccess('tpro') && !Yii::app()->user->isSuperAdmin) { ?>
		<div class = "col-sm-6 actualizar">
    		<?php echo CHtml::link('Crear Sistema Formal', array('/sistemas/create'), array('class' => 'btn btn-primary')); ?>
		</div>
		<div class = "col-sm-6 actualizar">
    		<a href="<?php echo Yii::app()->baseUrl; ?>/programa/sisfor.zip" download="sisfor.zip" class = "btn btn-primary">Descargar</a> 
		</div>
	<?php } ?>


<?php
$file = Yii::app()->basePath."/../programa/sisfor.EXE";
  echo exec($file);
?>
</div>
