<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_job_item',
    'pagerCssClass'=>'pagination',
)); ?>

