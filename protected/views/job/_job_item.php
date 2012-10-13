<div class="thumbnail"> <!--Result Item 1-->
    <div class="">
        <!--
            To do: kiem tra user type de thay doi as = freelancer hay client
        -->
        Title: <a href="<?php echo Yii::app()->request->baseUrl; ?>/job/view?as=freelancer"><?php echo $data->name ?></a>
    </div>
    <div class="">
        Skill:
        <?php foreach ($data->skills as $s) {
            echo $s->name;
        }?>
    </div>
    <div class="">
        Price: <?php $data->price ?>
    </div>
    <div class="">
        Description: <?php $data->description ?>
    </div>
    <div class="">
        <button class="btn btn-primary">Apply</button>
        <button class="btn btn-info">Share</button>
    </div>
</div> <!--Result Item 1-->
<br/>
