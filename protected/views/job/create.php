<div ><!--End PostTask Modals-->

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'job-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=> array('class'=>'form-search'),
    )); ?>

    <?php if(!$model->hasErrors()){ ?>
        <div class="alert alert-error">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <strong>Errors:</strong>
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php }?>

    <div class="alert alert-success">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <strong>Well done!</strong> You successfully read this important alert message. view <a href="#">details</a>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8"><!--Body content-->
                <div class="control-group">
                    <label class="control-label" for="inputTitle">Title:</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'name',array('id' => 'inputTitle', 'class'=>'span11', 'placeholder'=>'Title')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputDescription">Description:</label>
                    <div class="controls">
                        <?php echo $form->textArea($model,'description',
                            array('class'=>'span11', 'placeholder'=>'Description', 'rows' => 10));

                        /*
                        $this->widget('application.extensions.tinymce.ETinyMce', array(
                            'name'=>'Job[description]',
                            'value'=>$model->description,
                            'editorTemplate'=>'full',
                            'options' => array(
                                'model'=>'textareas',
                                'theme'=>"advanced",
                                'theme_advanced_buttons1'=>"save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                                'theme_advanced_buttons2'=>"",
                                'theme_advanced_buttons3'=>"",
                                'theme_advanced_buttons4'=>"")
                        )) */?>

                    </div>
                </div>
            </div><!--Body content-->
            <div class="span4"><!--Tag content-->
                <div class="control-group">
                    <label class="control-label" for="inputCategoryTag">Categories:</label>
                    <?php
			/*
				show du lieu category tu controller
			*/
                        echo $form->dropdownList(
                            $cat_model,
                            'id',
                            $cat_data,
                            array(
                                //'name'=>'Category[name]',
                                'data-placeholder'=>Yii::t('app','Select categories for this task'),
                            ));
                    ?>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputCategoryTag">Requires:</label>
                    <?php
			/*
				show du lieu skill tu controller
			*/
                        echo $form->dropdownList(
                            $skill_model,
                            'id',
                            CHtml::listData($skill_data, 'id', 'name'),
                            array(
                                //'name'=>'Category[name]',
                                'data-placeholder'=>Yii::t('app','Select skills for this job'),
                                'style'=>'width:350px;',
                                'class'=>'chzn-select',
                                'multiple tabindex'=>'6'));
                    ?>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputTitle">Price:</label>
                    <div class="controls">
                        <div class="input-append">
                        <?php
                            echo $form->textField(
                                $model,'price',
                                array(
                                    'placeholder'=>'Price'
                                ));
                        ?>
                            <span class="add-on">VND</span>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputTitle">Days:</label>
                    <div class="controls">
                        <div class="input-append">
                         <?php
                            echo $form->textField(
                                $model,'duration',
                                array(
                                    'placeholder'=>Yii::t('app','Days'),
                                    'class' => 'span12',
                                ));
                        ?>
                           <span class="add-on">Days</span>
                        </div>
                    </div>
                </div>
            </div><!--Tag content-->
        </div>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
		<?php echo CHtml::submitButton('Share', array('class'=>'btn')); ?>
	</div>
    <?php $this->endWidget(); ?>
</div> <!--End PostTask Modals-->


<script type="text/javascript">
    $(".chzn-select").chosen();
    $(".chzn-select-deselect").chosen({allow_single_deselect:true});
</script>
