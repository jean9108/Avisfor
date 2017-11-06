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
//            array('allow', // allow all users to perform 'index' and 'view' actions
//                'actions' => array('index', 'view'),
//                'users' => array('*'),
//            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'misSistemas', 'createpdf','generarPdf'),
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

    protected function gridMemberColumn($data, $row) {
        $sql = 'SELECT idRegla, inicio, fin FROM reglas WHERE  = Logica_idLogica' . $data->idLogica;
        $rows = Yii::app()->db->createCommand($sql)->queryAll();

        $result = '';
        $idx = 1;
        if (!empty($rows))
            foreach ($rows as $row) {
                $url = Yii::app()->createUrl('reglas/view', array('id' => $row['idRegla']));
                $style = $idx % 2 == 0 ? 'background:#F8F8F8; padding:0.5em;' : 'background:#E5F1F4; padding:0.5em;';
                $text = CHtml::tag('div', array('style' => $style), $row['inicio'] . ' ' . $row['fin']);
                $result .= CHtml::link($text, $url) . '<br/>';
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
     *  Manejo de los Sistemas que la persona crea 
     * */
    public function actionMisSistemas() {
        $estudiante = Estudiantes::model()->find("cruge_user_iduser=:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));

        if ($estudiante) {

            $this->render('misSistemas');
        } else
            $this->redirect(array('/estudiantes/create'));
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
        $estudiante = Estudiantes::model()->find("cruge_user_iduser =:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));
        $model->estudiantes_idestudiantes = $estudiante->idestudiante;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Logica'])) {
            $model->attributes = $_POST['Logica'];

            $detailOk = MultiModelForm::validate($regla, $validateRules, $deleteItems);

            if ($detailOk && empty($validateRules)) {
                Yii::app()->user->setFlash('error', 'No se ha podido subir el Sistema Formal');
                $detailOk = false;
            }

            if ($detailOk && $model->save()) {
                $reglaValues = array('Logica_idLogica' => $model->idLogica);


                if (MultiModelForm::save($regla, $validateRules, $deleteItems, $reglaValues)) {
                    $this->redirect(array('update', 'id' => $model->idLogica));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'regla' => $regla,
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
        $model->axioma2 = $model->axioma;
        $var = 0;
        $clic = '';
        $cl = 0;
        $reg = '';
        $casper = new Casper;
        $regla = new Reglas;
        $validateRules = array();

        if (count($model->prueba) == 0) {
            array_push($model->prueba, $model->axioma);
        }
//        $model->resultado = '20';
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['button1'])) {
            $model->attributes = $_POST['button1'];
        }
        if (isset($_POST['button2'])) {
            $rule = $_POST['button2'];
            $reglas = $_POST['Reglas'];
            $areg = explode(" ", $rule);
            $sum = intval($areg[1]) - 1;
            $var = $reglas['pk__'][$sum]['idreglas'];

            CVarDumper::dump($rule, 10, true);
        }

        if (isset($_POST['button3'])) {
            $clic = $_POST['button3'];
            CVarDumper::dump($reg, 10, true);
            CVarDumper::dump($clic, 10, true);

            if ($clic != '')
                $cl = 1;
        }

        if (isset($_POST['button4'])) {
            $algo = $_POST['button4'];
//            var_dump($algo);
        }
        if (isset($_POST['Logica'])) {
            $model->attributes = $_POST['Logica'];
            $model->resultado = $model->contar();
            if ($var != 0) {
                $model->solucion = array();
                $model->solucion = $model->aplicarReglas($var, $sum);
            }

            if ($cl == 1) {
                array_push($model->prueba, $clic);
                $contar = count($model->prueba);
                $model->axioma = $model->prueba[$contar - 1];
            }
            //die($model->ident);
            $rulesValues = array('Logica_idLogica' => $model->idLogica);

            MultiModelForm::save($regla, $validateRules, $deleteReglas, $rulesValues) && $model->save();
            //$this->redirect(array('admin', 'id' => $model->idLogica));
        }

        $this->render('update', array(
            'model' => $model,
            'regla' => $regla,
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

    public function actionGenerarPdf() {
        $model = Estudiantes::model()->find("cruge_user_iduser =:cruge_user_iduser", array(":cruge_user_iduser" => Yii::app()->user->id));
//        $model->estudiantes_idestudiantes = $estudiante->idestudiante;
        $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'A4', '', '', 15, 15, 35, 25, 9, 9, 'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
        $mPDF1->useOnlyCoreFonts = true;
        $mPDF1->SetTitle("Ejercicio Modelos Matemáticos ".date('Y'));
        $mPDF1->SetAuthor( $model->nombre.' '.$model->apellido);
//        $mPDF1->SetWatermarkText("JuzgadoSys");
        $mPDF1->showWatermarkText = true;
        $mPDF1->watermark_font = 'DejaVuSansCondensed';
        $mPDF1->watermarkTextAlpha = 0.1;
        $mPDF1->SetDisplayMode('fullpage');
        $mPDF1->WriteHTML($this->renderPartial('pdfReport', array('model' => $model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
        $mPDF1->Output('Reporte_Productos' . date('YmdHis'), 'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
        exit;
    }

    /*     * Prueba Pdf* */

    public function actionCreatepdf() {

        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        spl_autoload_register(array('YiiBase', 'autoload'));

        // set document information
        $pdf->SetCreator(PDF_CREATOR);

        $pdf->SetTitle("Selling Report -2013");
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Selling Report -2013", "selling report for Jun- 2013");
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetTextColor(80, 80, 80);
        $pdf->AddPage();

        //Write the html
        $html = "<div style='margin-bottom:15px;'>This is testing HTML.</div>";
        //Convert the Html to a pdf document
        $pdf->writeHTML($html, true, false, true, false, '');

        $header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)'); //TODO:you can change this Header information according to your need.Also create a Dynamic Header.
        // data loading
        $data = $pdf->LoadData(Yii::getPathOfAlias('ext.tcpdf') . DIRECTORY_SEPARATOR . 'table_data_demo.txt'); //This is the example to load a data from text file. You can change here code to generate a Data Set from your model active Records. Any how we need a Data set Array here.
        // print colored table
        $pdf->ColoredTable($header, $data);
        // reset pointer to the last page
        $pdf->lastPage();

        //Close and output PDF document
        $pdf->Output('filename.pdf', 'I');
        Yii::app()->end();
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
