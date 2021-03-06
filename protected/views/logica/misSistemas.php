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
    <?php if (Yii::app()->user->checkAccess('tpro') && !Yii::app()->user->isSuperAdmin || Yii::app()->user->checkAccess('estudiante') && !Yii::app()->user->isSuperAdmin) { ?>
        <div class = "col-sm-6 actualizar">
            <?php echo CHtml::link('<i class="fa fa-plus" aria-hidden="true"></i> Crear Sistema Formal', array('/logica/create'), array('class' => 'btn btn-primary')); ?>
        </div>
        <div class = "col-sm-6 actualizar">
            <a href="<?php echo Yii::app()->baseUrl; ?>/programa/sisfor.zip" download="sisfor.zip" class = "btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Descargar</a> 
        </div>
   
    <?php } ?>
</div>

<div class="table table-responsive">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'datos-grid',
	'dataProvider'=>new CActiveDataProvider('Logica', array(
            'criteria'=>array(
                    'condition'=>"estudiantes_idestudiantes = $estudiante->idestudiante ",
                    'params'=>array(':tipo'=>$estudiante->idestudiante),
        ),

        )),
    
	'columns'=>array(
		
                'axioma2',
                'conjetura',
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
                            'label' => '<span class = "tabla btn btn-success "><i class="fa fa-window-restore" aria-hidden="true"></i>Ir al Simulador</span>',
                            'imageUrl' => false,
                            'url'=>'array("logica/update/?id=$data->idLogica")'
                        ),
                            'delete' => array(
                            'label'=>'Eliminar',
                            'label' => '<span class = "tabla btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</span>',    
                            'imageUrl' => false,
                            'url'=>'array("logica/delete/?id=$data->idLogica")'
                        ),
                    ),     
		),
	),
        )); ?>
</div