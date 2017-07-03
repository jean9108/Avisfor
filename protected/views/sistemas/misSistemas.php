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
<div class = "col-sm-12">
    <?php if (Yii::app()->user->checkAccess('tpro') && !Yii::app()->user->isSuperAdmin) { ?>
        <div class = "col-sm-4 actualizar">
            <?php echo CHtml::link('<i class="fa fa-plus" aria-hidden="true"></i> Crear Sistema Formal', array('/sistemas/create'), array('class' => 'btn btn-primary')); ?>
        </div>
        <div class = "col-sm-4 actualizar">
            <a href="<?php echo Yii::app()->baseUrl; ?>/programa/sisfor.zip" download="sisfor.zip" class = "btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Descargar</a> 
        </div>
    
        <div class = "col-sm-4 actualizar">
            <?php echo CHtml::link('<i class="fa fa-plus" aria-hidden="true"></i> Ir al simulador', array('/sisfor/create'), array('class' => 'btn btn-primary')); ?>
        </div>
    <?php } ?>


    <?php
    $file = Yii::app()->basePath . "/../programa/sisfor.EXE";
    //echo exec($file);
    ?>
</div>

<div class="table table-responsive">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'datos-grid',
	'dataProvider'=>new CActiveDataProvider('Sistemas', array(
            'criteria'=>array(
                    'condition'=>"estudiantes_idestudiante = $estudiante->idestudiante ",
                    'params'=>array(':tipo'=>$estudiante->idestudiante),
        ),

        )),
    
	'columns'=>array(
		
                'sistema',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}{delete}', //Only shows Delete button
                        'buttons'=>array(            
                        'view' => array(
                            'label'=>'Ver',
                            'url'=>'array("fotosvideos/view/?id=$data->FotosVideosID")'
                        ),
                            'update' => array(
                            'label'=>'Editar',
                            'label' => '<span class = "btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</span>',
                            'imageUrl' => false,
                            'url'=>'array("sistemas/update/?id=$data->idsistemas")'
                        ),
                            'delete' => array(
                            'label'=>'Eliminar',
                            'label' => '<span class = "btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</span>',    
                            'imageUrl' => false,
                            'url'=>'array("sistemas/delete/?id=$data->idsistemas")'
                        ),
                    ),     
		),
	),
        )); ?>
</div