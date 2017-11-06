<?php

/**
 * Declares customized attribute labels.
 * If not declared here, an attribute would have a label that is
 * the same as its name with the first letter in upper case.
 */
class Sisfor extends CFormModel {

    public $axioma;
    public $letra1;
    public $letra2;
    public $conjetura;
    public $esAxioma;
    public $reglas = array();
    public $posibilidades = array();
    public $regla1a;
    public $regla1b;
    public $regla2a;
    public $regla2b;
    public $regla3a;
    public $regla3b;
    public $regla4a;
    public $regla4b;
    public $regla5a;
    public $regla5b;
    public $regla6a;
    public $regla6b;
    public $regla7a;
    public $regla7b;
    public $regla8a;
    public $regla8b;
    public $regla9a;
    public $regla9b;
    public $regla10a;
    public $regla10b;
    public $regla11a;
    public $regla11b;
    public $regla12a;
    public $regla12b;
    public $regla13a;
    public $regla13b;

    public function rules() {
        return array(
            // name, email, subject and body are required
            array('axioma, conjetura,regla1a,regla1b', 'required'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'axioma' => 'Axioma',
            'letra1' => 'Letra',
            'letra2' => 'Número',
            'conjetura' => 'Conjetura',
            'esAxioma' => 'Axioma',
            'reglas' => 'Reglas Aplicadas',
            'posibilidades' => 'Posibilidades',
            'regla1a' => 'Regla 1',
            'regla1b' => 'Regla 1',
            'regla2a' => 'Regla 2',
            'regla2b' => 'Regla 2',
            'regla3a' => 'Regla 3',
            'regla3b' => 'Regla 3',
            'regla4a' => 'Regla 4',
            'regla4b' => 'Regla 4',
            'regla5a' => 'Regla 5',
            'regla5b' => 'Regla 5',
            'regla6a' => 'Regla 6',
            'regla6b' => 'Regla 6',
            'regla7a' => 'Regla 7',
            'regla7b' => 'Regla 7',
            'regla8a' => 'Regla 8',
            'regla8b' => 'Regla 8',
            'regla9a' => 'Regla 9',
            'regla9b' => 'Regla 9',
            'regla10a' => 'Regla 10',
            'regla10b' => 'Regla 10',
            'regla11a' => 'Regla 11',
            'regla11b' => 'Regla 11',
            'regla12a' => 'Regla 12',
            'regla12b' => 'Regla 12',
            'regla13a' => 'Regla 13',
            'regla13b' => 'Regla 13',
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    function getAxioma() {
        return $this->axioma;
    }

    function getLetra1() {
        return $this->letra1;
    }

    function getLetra2() {
        return $this->letra2;
    }

    function getConjetura() {
        return $this->conjetura;
    }

    function getEsAxioma() {
        return $this->esAxioma;
    }

    function getReglas() {
        return $this->reglas;
    }

    function getPosibilidades() {
        return $this->posibilidades;
    }

    function getRegla1a() {
        return $this->regla1a;
    }

    function getRegla1b() {
        return $this->regla1b;
    }

    function getRegla2a() {
        return $this->regla2a;
    }

    function getRegla2b() {
        return $this->regla2b;
    }

    function getRegla3a() {
        return $this->regla3a;
    }

    function getRegla3b() {
        return $this->regla3b;
    }

    function getRegla4a() {
        return $this->regla4a;
    }

    function getRegla4b() {
        return $this->regla4b;
    }

    function getRegla5a() {
        return $this->regla5a;
    }

    function getRegla5b() {
        return $this->regla5b;
    }

    function getRegla6a() {
        return $this->regla6a;
    }

    function getRegla6b() {
        return $this->regla6b;
    }

    function getRegla7a() {
        return $this->regla7a;
    }

    function getRegla7b() {
        return $this->regla7b;
    }

    function getRegla8a() {
        return $this->regla8a;
    }

    function getRegla8b() {
        return $this->regla8b;
    }

    function getRegla9a() {
        return $this->regla9a;
    }

    function getRegla9b() {
        return $this->regla9b;
    }

    function getRegla10a() {
        return $this->regla10a;
    }

    function getRegla10b() {
        return $this->regla10b;
    }

    function getRegla11a() {
        return $this->regla11a;
    }

    function getRegla11b() {
        return $this->regla11b;
    }

    function getRegla12a() {
        return $this->regla12a;
    }

    function getRegla12b() {
        return $this->regla12b;
    }

    function getRegla13a() {
        return $this->regla13a;
    }

    function getRegla13b() {
        return $this->regla13b;
    }

    function setAxioma($axioma) {
        $this->axioma = $axioma;
    }

    function setLetra1($letra1) {
        $this->letra1 = $letra1;
    }

    function setLetra2($letra2) {
        $this->letra2 = $letra2;
    }

    function setConjetura($conjetura) {
        $this->conjetura = $conjetura;
    }

    function setEsAxioma($esAxioma) {
        $this->esAxioma = $esAxioma;
    }

    function setReglas($reglas) {
        $this->reglas = $reglas;
    }

    function setPosibilidades($posibilidades) {
        $this->posibilidades = $posibilidades;
    }

    function setRegla1a($regla1a) {
        $this->regla1a = $regla1a;
    }

    function setRegla1b($regla1b) {
        $this->regla1b = $regla1b;
    }

    function setRegla2a($regla2a) {
        $this->regla2a = $regla2a;
    }

    function setRegla2b($regla2b) {
        $this->regla2b = $regla2b;
    }

    function setRegla3a($regla3a) {
        $this->regla3a = $regla3a;
    }

    function setRegla3b($regla3b) {
        $this->regla3b = $regla3b;
    }

    function setRegla4a($regla4a) {
        $this->regla4a = $regla4a;
    }

    function setRegla4b($regla4b) {
        $this->regla4b = $regla4b;
    }

    function setRegla5a($regla5a) {
        $this->regla5a = $regla5a;
    }

    function setRegla5b($regla5b) {
        $this->regla5b = $regla5b;
    }

    function setRegla6a($regla6a) {
        $this->regla6a = $regla6a;
    }

    function setRegla6b($regla6b) {
        $this->regla6b = $regla6b;
    }

    function setRegla7a($regla7a) {
        $this->regla7a = $regla7a;
    }

    function setRegla7b($regla7b) {
        $this->regla7b = $regla7b;
    }

    function setRegla8a($regla8a) {
        $this->regla8a = $regla8a;
    }

    function setRegla8b($regla8b) {
        $this->regla8b = $regla8b;
    }

    function setRegla9a($regla9a) {
        $this->regla9a = $regla9a;
    }

    function setRegla9b($regla9b) {
        $this->regla9b = $regla9b;
    }

    function setRegla10a($regla10a) {
        $this->regla10a = $regla10a;
    }

    function setRegla10b($regla10b) {
        $this->regla10b = $regla10b;
    }

    function setRegla11a($regla11a) {
        $this->regla11a = $regla11a;
    }

    function setRegla11b($regla11b) {
        $this->regla11b = $regla11b;
    }

    function setRegla12a($regla12a) {
        $this->regla12a = $regla12a;
    }

    function setRegla12b($regla12b) {
        $this->regla12b = $regla12b;
    }

    function setRegla13a($regla13a) {
        $this->regla13a = $regla13a;
    }

    function setRegla13b($regla13b) {
        $this->regla13b = $regla13b;
    }
}
?>
