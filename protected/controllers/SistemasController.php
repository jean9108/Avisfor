<?php

class SistemasController extends Controller {

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
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'view', 'misSistemas','download','prologView','delete','contarLetras'),
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
        $model = new Sistemas;
        $user = Yii::app()->user->id;
        $estudiante =Estudiantes::model()->find("cruge_user_iduser =:cruge_user_iduser", array(":cruge_user_iduser" => $user));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $unique = date('Ymdi');
        if (isset($_POST['Sistemas'])) {
            $model->attributes = $_POST['Sistemas'];

            $file = CUploadedFile::getInstance($model, 'sistema');
            if (is_object($file) && get_class($file)) {
                $fileName = "{$unique}-{$file}";
                $model->sistema = $fileName;
            }

            $model->estudiantes_idestudiante = $estudiante->idestudiante;
            if ($model->save()){

                 if (is_object($file) && get_class($file) === 'CuploadedFile') {
                    $file->saveAs(Yii::app()->basePath.'/../sisform/'.$fileName);
                }

                $this->redirect(array('misSistemas'));
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Sistemas'])) {
            $model->attributes = $_POST['Sistemas'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idsistemas));
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
        $dataProvider = new CActiveDataProvider('Sistemas');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Sistemas('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Sistemas']))
            $model->attributes = $_GET['Sistemas'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     *  Manejo de los Sistemas que la persona crea 
     **/
    public function actionMisSistemas() {
        $estudiante = Estudiantes::model()->find("cruge_user_iduser=:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));

        if ($estudiante) {

            $this->render('misSistemas');
        } else
            $this->redirect(array('/estudiantes/create'));
    }

    /**
     * Descargar el .exe de sisfor 
     **/
    public function actionDownload() {

        $model = new Download;
        $name = $_GET['file'];
        $upload_path = Yii::app()->params['/programa/sisfor.zip'];
        
        if (file_exists($upload_path . $name)) {
            Yii::app()->getRequest()->sendFile($name, file_get_contents($upload_path . $name));
        } else {
            $this->render('download404');
        }
    }

    /**
     * Vista para Prolog
    **/
    public function actionPrologView(){
        $estudiante = Estudiantes::model()->find("cruge_user_iduser=:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));
        if($estudiante){
            $this->render('prologView');
        }else
            $this->redirect(array('/estudiantes/create'));
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Sistemas the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Sistemas::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    
    /**
     * COntar letras 
    **/
    
    public function getContarLetras($axioma,$letra){
        die('estoy aqui');
        $pos = strpos($axioma, $letra);
        var_dump($pos);
    }
    /**
     * Performs the AJAX validation.
     * @param Sistemas $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sistemas-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
