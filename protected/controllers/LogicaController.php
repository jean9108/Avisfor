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
     * Create in diferent controller 
     * */
    public function actions() {
        return array(
            'getRowForm' => array(
                'class' => 'ext.dynamictabularform.actions.GetRowForm',
                'view' => '_form',
                'modelClass' => 'reglas'
            ),
        );
    }



    public function actionCreate() {
        $model = new Logica();
        $reglas = array(new Reglas);
        $estudiante = Estudiantes::model()->find("cruge_user_iduser =:cruge_user_iduser", array(":cruge_user_iduser"=> Yii::app()->user->id));
        $model->estudiantes_idestudiantes = $estudiante->idestudiante;
       
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Logica'])) {
            $model->attributes = $_POST['Logica'];
            
            /**
             * creating an array of reglas objects
            */
            if(isset($_POST['Reglas'])){
                $reglas = array();
                foreach ($_POST['Reglas'] as $key=>$value){
                    /*
                     * sladetail needs a scenario wherein the fk sla_id
                     * is not required because the ID can only be
                     * linked after the sla has been saved
                     */
                    $regla = new Reglas('batchSave');
                    $regla->attributes = $value;
                    $reglas[] = $regla;
                }
            }
            
            /**
            * validating the sla and array of sladetail
            **/
            
            $valid = $model->validate();
            foreach ($reglas as $regla){
                $valid = $regla->validate() & $valid;
            }
            
          
            if($valid){
                $transaction = $model->getDbConnection()->beginTransaction();
                try{
                    $model->save();
                    $model->refresh();
                    
                    foreach ($reglas as $regla){
                        $regla->Logica_idLogica=$model->idLogica;
                        $regla->save();
                    }
                    $transaction->commit();                    
                } catch (Exception $e){
                    $transaction->rollback();
                }
                $this->redirect(array('view', 'id' => $model->idLogica));
            }
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idLogica));
        }

        $this->render('create', array(
            'model' => $model,
            'reglas' => $reglas,
        ));
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $reglas = $model->idLogica;
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Logica'])) {
            $model->attributes = $_POST['Logica'];
            if(isset($_POST['Reglas'])){
                $reglas = array();
                foreach($_POST['Reglas'] as $key => $value){
                    /**
                     * here we will take advantage of the updateType attribute so
                     * that we will be able to determine what we want to do 
                     * to a specific row
                     */
                    if($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_CREATE)
                        $reglas[$key] = new Reglas();
                    else if($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_UPDATE)
                        $reglas[$key] = Reglas::model()->findAllByPk ($value['idRegla']);
                    else if($value['updateType'] == DynamicTabularForm::UPDATE_TYPE_DELETE){
                        $delete = Reglas::model()->findByPk($value['idRegla']);
                        if($delete->delete()){
                            unset($reglas[$key]);
                            continue;
                        }
                    }
                    $reglas[$key]->attributes = $value;  
                }
            }
                $valid = $model->validate();
                foreach ($reglas as $regla){
                    $valid = $regla->validate() & valid;
                }
                if($valid){
                    $transaction = $model->getDbConnection()->beginTransaction();
                    try{
                        $model->save();
                        $model->refresh();
                        foreach ($reglas as $regla){
                             $regla->Logica_idLogica=$model->idLogica;
                        $regla->save();
                        }
                        $transaction->commit();
                    } catch (Exception $e){
                        $transaction->rollback();
                    }
                    $this->redirect(array('view', 'id' => $model->idLogica));
                }
            }
            

        $this->render('update', array(
            'model' => $model,
            'reglas' => $reglas,
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
