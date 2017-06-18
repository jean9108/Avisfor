<div class="col-sm-3"></div>

<!--Login-->
<div class="col-sm-5 login">
    <div class="col-sm-12 tituloP">
        <h1><i class="fa fa-user" aria-hidden="true"></i> <?php echo CrugeTranslator::t('logon', "Iniciar Sesión"); ?></h1>
    </div>
    <?php if (Yii::app()->user->hasFlash('loginflash')): ?>
        <div class="flash-error">
            <?php echo Yii::app()->user->getFlash('loginflash'); ?>
        </div>
    <?php else: ?>
        <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'logon-form',
                'enableClientValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>
            <div class="col-sm-12 sep">
                <div class="row">
                    <label>Email o Usuario:<span style="color:red;">*</span></label>
                    <?php echo $form->textField($model, 'username', array("class" => "form-control")); ?>
                    <?php echo $form->error($model, 'username'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->passwordField($model, 'password', array("class" => "form-control")); ?>
                    <?php echo $form->error($model, 'password'); ?>
                </div>

                <div class="row rememberMe">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?>
                    <?php echo $form->label($model, 'rememberMe'); ?>
                    <?php echo $form->error($model, 'rememberMe'); ?>
                </div>

                <div class="row buttons">
                    <div class="col-sm-12 botonlogin">
                        <input name="submit" value="Iniciar Sesión" type="submit" class="btn btn-primary">
                    </div>
                    <div class="col-sm-6 recordar">
                        <?php echo Yii::app()->user->ui->passwordRecoveryLink; ?>
                    </div>
                    <div class="col-sm-6 clave">
                        <?php
                        if (Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin') === 1)
                            echo Yii::app()->user->ui->registrationLink;
                        ?>
                    </div>    
                </div>
            </div>

            <?php
            //	si el componente CrugeConnector existe lo usa:
            //
		if (Yii::app()->getComponent('crugeconnector') != null) {
                if (Yii::app()->crugeconnector->hasEnabledClients) {
                    ?>
                    <div class='crugeconnector'>
                        <span><?php echo CrugeTranslator::t('logon', 'You also can login with'); ?>:</span>
                        <ul>
                            <?php
                            $cc = Yii::app()->crugeconnector;
                            foreach ($cc->enabledClients as $key => $config) {
                                $image = CHtml::image($cc->getClientDefaultImage($key));
                                echo "<li>" . CHtml::link($image, $cc->getClientLoginUrl($key)) . "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>


            <?php $this->endWidget(); ?>
        </div>
    <?php endif; ?>
</div>
<div class="col-sm-3"></div>
