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
         <td width="50%" style="text-align: center;"><br /><b>ESCUELA COLOMBIANA DE INGENIERÍA</b><br/><b>MODELOS MATEMÁTICOS PARA LA INGENIERÍA</b><br /><b>MMIN-<?php echo date('Y') ?></b></td>
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

        <?php $estudiante = Estudiantes::model()->find("idestudiante =:idestudiante", array(":idestudiante" => $model->estudiantes_idestudiantes)); ?>
        <?php $reglas = Reglas::model()->findAll("Logica_idLogica =:Logica_idLogica", array(":Logica_idLogica" => $model->idLogica)) ?>
        <div style="padding-top: 5%;"></div>
        <div>
            <table width = "100%">
                <tr>
                    <td width = "80%"><span style = "text-align: left"><b>Nombre: </b><u><?php echo ucwords($estudiante->nombre . ' ' . $estudiante->apellido) ?></u></span></td>
                    <td width = "20%"><span style="text-align: right"><b>Fecha: </b><?php echo date("d/m/Y"); ?></span></td>

                </tr>
            </table>
        </div>

        <div style="padding-top: 2%;"></div>
        <h3 style = "text-align: center">Taller Aplicación de Sistemas Formales</h3>

        <div style="padding-top: 2%;"></div>
        <p style = "text-align:justify">Construir un sistema formal que partiendo de <?php echo $model->axioma ?> como axioma genere cadena de la forma:</p>
        <p style = "text-align:justify"><b><?php echo $model->conjetura ?></b></p>
        <div style="padding-top: 2%;"></div>
        <h4 style = "text-align: center">Reglas</h4>
        <div style="padding-top: 2%;"></div>
        <div>
            <?php $cont = 1; ?>
            <?php foreach ($reglas as $key): ?>
                <?php $regla = R . (string) $cont; ?>
                <p style = "text-align:justify">
                    <b style = "color: red"><?php echo $regla ?>:</b>
                    <?php echo $key->inicio ?>
                    <img style = "width:2%;" src="https://n6-img-fp.akamaized.net/iconos-gratis/siguiente_318-140722.jpg?size=338c&ext=jpg" alt="->"/>
                    <?php echo $key->fin ?>
                </p>
                <?php $cont += 1 ?>
            <?php endforeach; ?>
            <div style="padding-top: 2%;"></div>    
            <?php // CHtml::image("https://n6-img-fp.akamaized.net/iconos-gratis/siguiente_318-140722.jpg?size=338c&ext=jpg","PDF",array("title"=>"Exportar a PDF"))?>
        </div>   
        <p style = "text-align:justify"><b style="color:red ">Axioma: </b><?php echo $model->axioma ?></p>
        <p style = "text-align:justify"><b style="color: red;">Conjetura: </b><?php echo $model->conjetura ?></p>

    </body>
</html>
