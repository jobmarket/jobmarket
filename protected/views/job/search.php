<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'/job/_job_item',
    'pagerCssClass'=>'pagination pagination-right',
    'pager' => array(
            'header'=>'',
            'selectedPageCssClass' => 'active',
            'hiddenPageCssClass' => 'hidden',
            'nextPageLabel' => '>' ,
            'prevPageLabel' => '<' ,
            'firstPageLabel' => '<<' ,
            'lastPageLabel' => '>>',
            'htmlOptions' => array('class'=>'', 'id'=>''),
        ),
)); ?>

