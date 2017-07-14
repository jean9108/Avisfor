<?php

class LogicaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    protected function gridMemberColumn($data,$row)
    {
       $sql = 'SELECT idRegla, inicio, fin FROM reglas WHERE  = Logica_idLogica' . $data->idLogica;
       $rows = Yii::app()->db->createCommand($sql)->queryAll();

       $result = '';
       $idx = 1;
       if(!empty($rows))
           foreach ($rows as $row)
           {
               $url = Yii::app()->createUrl('reglas/view',array('id'=>$row['idRegla']));
               $style = $idx % 2 == 0 ? 'background:#F8F8F8; padding:0.5em;' : 'background:#E5F1F4; padding:0.5em;';
               $text = CHtml::tag('div',array('style'=>$style),$row['inicio'].' '.$row['fin']);
               $result .= CHtml::link($text,$url) .'<br/>';
               $idx++;
           }
       return $result;
    }
    
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
               
        Yii::import('ext.multimodelform.MultiModelForm');
        $model = new Logica;
        $regla = new Reglas;
        $validateRules = array();
        $estudiante = Estudiantes::model()->find("cruge_user_iduser =:cruge_user_iduser",array(":cruge_user_iduser"=> Yii::app()->user->id));
        $model->estudiantes_idestudiantes = $estudiante->idestudiante;
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Logica'])) {
            $model->attributes = $_POST['Logica'];
            
            $detailOk = MultiModelForm::validate($regla, $validateRules, $deleteItems);
            
            if($detailOk && empty($validateRules)){
                Yii::app()->user->setFlash('error','No se ha podido subir el Sistema Formal');
                $detailOk = false;
            }
            
            if ($detailOk && $model->save()){
                $reglaValues = array('Logica_idLogica' => $model->idLogica);
                
                
                if(MultiModelForm::save($regla,$validateRules,$deleteItems,$reglaValues)){
                    $this->redirect(array('admin', 'id' => $model->idLogica));
                }  
            }
        }

        $this->render('create', array(
            'model' => $model,
            'regla' =>$regla,
            'validateRules' => $validateRules,
        ));
    }
    

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        Yii::import('ext.multimodelform.MultiModelForm');
        $model = $this->loadModel($id);
        $model->derivacion = $model->axioma;
        
        $regla = new Reglas;
        $validateRules = array();
//        $model->resultado = '20';
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if(isset($_POST['button1'])){
            $model->attributes = $_POST['button1'];
            
            
            //$_POST['button1']['conjetura'] = '20';
           //$model->save();
//            var_dump($var); 
            
        }
        
        if (isset($_POST['Logica'])) {
            $model->attributes = $_POST['Logica'];
            
            $model->resultado = $model->contar();
            $rulesValues = array('Logica_idLogica'=> $model->idLogica);
             MultiModelForm::save($regla, $validateRules, $deleteReglas,$rulesValues) && $model->save();
                //$this->redirect(array('admin', 'id' => $model->idLogica));
        }

        $this->render('update', array(
            'model' => $model,
            'regla' =>$regla,
            'validateRules' => $validateRules,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Logica');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Logica('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Logica']))
            $model->attributes = $_GET['Logica'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Logica the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Logica::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Logica $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'logica-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
