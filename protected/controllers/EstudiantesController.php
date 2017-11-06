<?php

class EstudiantesController extends Controller {

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
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'view'),
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Estudiantes;
        $unique = date('Ymdi');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Estudiantes'])) {
            $model->attributes = $_POST['Estudiantes'];
            $file = CUploadedFile::getInstance($model, 'foto');
            if (is_object($file) && get_class($file)) {
                $fileName = "{$unique}-{$file}";
                $model->foto = $fileName;
            }

            $model->cruge_user_iduser = Yii::app()->user->id;
            if ($model->save()) {
                if (is_object($file) && get_class($file) === 'CuploadedFile') {
                    $file->saveAs(Yii::app()->basePath.'/../uploads/'.$fileName);
                }
                $this->redirect(array('view', 'id' => $model->idestudiante));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $foto = $model->foto;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Estudiantes'])) {
            //Formato Hora
            $unique = date('Ymdhi');
            $model->attributes = $_POST['Estudiantes'];
            $file = CUploadedFile::getInstance($model, 'foto');
            if ($file != NULL) {
                if (is_object($file) && get_class($file)) {
                    
                    $fileName = "{$unique}-{$file}";
                    $model->foto = $fileName;
                    
                }
            }else{

                $model->foto = $foto;
            }
            if ($model->save()){

                if ($file!= NULL) {
                    
                    $file->saveAs(Yii::app()->basePath.'/../uploads/'.$fileName);
                }

                $this->redirect(array('view', 'id' => $model->idestudiante));
            }
        }

        $this->render('update', array(
            'model' => $model,
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
        $dataProvider = new CActiveDataProvider('Estudiantes');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Estudiantes('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Estudiantes']))
            $model->attributes = $_GET['Estudiantes'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Estudiantes the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Estudiantes::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Estudiantes $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'estudiantes-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
