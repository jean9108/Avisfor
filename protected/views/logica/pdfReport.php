<html>
<head>
<style>
 body {font-family: sans-serif;
 font-size: 10pt;
 }
 p { margin: 0pt;
 }
 td { vertical-align: top; }
 .items td {
 border-left: 0.1mm solid #000000;
 border-right: 0.1mm solid #000000;
 }
 table thead td { background-color: #EEEEEE;
 text-align: center;
 border: 0.1mm solid #000000;
 }
 .items td.blanktotal {
 background-color: #FFFFFF;
 border: 0mm none #000000;
 border-top: 0.1mm solid #000000;
 }
 .items td.totals {
 text-align: right;
 border: 0.1mm solid #000000;
 }
</style>
</head>
<body>
 
<!--mpdf
 <htmlpageheader name="myheader">
 <table width="100%"><tr>
 <td width="30%"><img style = "width:30%" src="https://upload.wikimedia.org/wikipedia/en/c/cb/Escuela_colombiana_de_ingenieria_logo2.png" title="yii logo"/></td>
 <td width="50%" style="text-align: center;"><br /><b>ESCUELA COLOMBIANA DE INGENIERÍA</b><br/><b>MODELOS MATEMÁTICOS PARA LA INGENIERÍA</b><br /><b>MMIN-<?php echo date('Y')?></b></td>
 <td width="20%"></td>   
 </tr></table>
 </htmlpageheader>
 
<htmlpagefooter name="myfooter">
 <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
 Página {PAGENO} de {nb}
 </div>
 </htmlpagefooter>
 
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
 <sethtmlpagefooter name="myfooter" value="on" />
 mpdf-->

<div>
    <p>
        <span style = "text-align: left"><b>Nombre: </b><u><?php echo ucwords($model->nombre.' '.$model->apellido) ?></u></span>
        <span style="text-align: right"><b>Fecha: </b><?php echo date("d/m/Y"); ?></span>
    </p>
</div>


<h3 style = "text-align: center">Taller Aplicación de Sistemas Formales</h3>

<p style = "text-align:justify">Construir un sistema formal que partiendo de  __ como axioma genere cadena de la forma:</p>
 </body>
 </html>
