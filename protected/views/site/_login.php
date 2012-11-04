<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', 'id'=>'login-form'),
)) ?>

<?= $form->errorSummary($model) ?>
<div class="control-group">
	<?= $form->labelEx($model,'email', array('class'=>'control-label')) ?>
	<div class="controls">
		<?= $form->textField($model,'email') ?>
	</div>
</div>

<div class="control-group">
	<?= $form->labelEx($model,'password', array('class'=>'control-label')) ?>
	<div class="controls">
		<?= $form->passwordField($model,'password') ?>
	</div>
</div>

<div class="control-group">
	<div class="controls">
        <label class="checkbox">
			<?= $form->checkBox($model,'rememberMe') ?>				
			<?= $model->getAttributeLabel('rememberMe')?>				
			<?= CHtml::link("Lost Password", array('user/reset', 'email'=>$model->email)) ?>
		</label>
	</div>
</div>


<div class="control-group">
     <div class="controls">
	<?= CHtml::submitButton(
			Yii::t('app', 'Log in'),
			array('class'=>'btn btn-primary btn-large span2', 'id'=>'login-btn')
	)?>
	</div>					
</div>

<?php $this->endWidget() ?>	
