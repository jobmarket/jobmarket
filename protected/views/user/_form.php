<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal', 'id'=>'register-form'),
)) ?>

    <?= $form->errorSummary($model) ?>

    <div class="control-group">
        <?= $form->labelEx($model,'email', array('class'=>'control-label')) ?>
      <div class="controls">
        <?= $form->textField($model,'email',array('size'=>30,'maxlength'=>128)) ?>
      </div>
    </div>

    <div class="control-group">
        <?= $form->labelEx($model,'password', array('class'=>'control-label')) ?>
      <div class="controls">
        <?= $form->passwordField($model,'password',array('size'=>30,'maxlength'=>60)) ?>
      </div>
    </div>

    <div class="control-group">
        <?= $form->labelEx($model,'password_repeat', array('class'=>'control-label')) ?>
      <div class="controls">
        <?= $form->passwordField($model,'password_repeat',array('size'=>30,'maxlength'=>60)) ?>
      </div>
    </div>

    <div class="control-group">
        <?= $form->labelEx($model,'name', array('class'=>'control-label')) ?>
      <div class="controls">
        <?= $form->textField($model,'name',array('size'=>30,'maxlength'=>60)) ?>
      </div>
    </div>

    <div class="control-group">
        <?= $form->labelEx($model, 'gender',array('class'=>'control-label')); ?>
        <div class="controls">
           <?= $form->dropDownList($model, 'gender', $model->genderOptions, array('empty' => 'Select Sex', 'class'=>'span2')); ?>
        </div>
    </div>

    <div class="control-group">
      <div class="controls">
        <?= CHtml::submitButton($model->isNewRecord ? Yii::t('app','Sign Up') : Yii::t('app','Save'),
                 array('class'=>'btn btn-primary btn-large span2', 'id'=>'signup-btn')) ?>
      </div>
    </div>
<?php $this->endWidget() ?>
