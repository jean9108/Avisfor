<?php
/* @var $this SistemasController */
/* @var $model Sistemas */
$estudiante = Estudiantes::model()->find("cruge_user_iduser=:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));
$this->breadcrumbs=array(
	'Sistemas Formales',
	$estudiante->getNombresyApellidos(),
	'Guardar Sistema',
);
?>

<h1>Guardar Mi Sistema Formal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>