<div class="actionBar">
<?php if (Yii::app()->user->checkAccess('manageUsers')) { ?>
[<?= CHtml::link('Manage Users', array('admin')); ?>]
<?php } ?>
</div>

<?= $this->renderPartial('_form', array(
	'model'=>$model,
    'scenario'=>'create',
	'update'=>false,
)) ?>

