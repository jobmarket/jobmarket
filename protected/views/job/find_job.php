<div class="span8 pull-left"> <!--Search-->
    <div class="thumbnail"> <!--Search Box-->
            <div class="input-append">
                <input id='keyword' type="text" class="span5 search-query" placeholder="Keywords">
                <button id='search-btn' class="btn" type="submit">Search</button>
            </div>
            <label class="checkbox">
                <input type="checkbox"> Use Filter
            </label>
    </div>  <!--Search Box-->
    <div class="">  <!--Sort-->
            Sort by:
            <select class="">
                <option>Newest</option>
                <option>Most Paid</option>
            </select>
    </div>  <!--Sort-->

    <div id="search-result" class=""> <!--Search Result-->
        <?php $this->renderPartial('/job/search', array('dataProvider'=> $dataProvider))?>
    </div>  <!--Search Result-->
    <div class="">  <!--Sort-->
            Sort by:
            <select class="">
                <option>Newest</option>
                <option>Most Paid</option>
            </select>
    </div>  <!--Sort-->
</div> <!--Search-->

<div class="span3 pull-right">  <!--Filter-->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Filter:</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>
                <div id="accordion2" class="accordion">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a data-toggle="collapse" data-target="#collapseLocation" class="accordion-toggle collapsed">
                                <i class="icon-list-alt"></i> Location:
                            </a>
                        </div>
                        <div id="collapseLocation" class="accordion-body collapse"  style="height: 0px;">
                            <div class="accordion-inner">
                                <?php echo CHtml::checkBoxList(
                                    'category',
                                    array('hcm', 'hn'),
                                    array('hcm'=>'Ho Chi Minh', 'hn'=>'Ha Noi'),
                                    array(
                                        'separator'=>'',
                                        'template'=>'<label class="checkbox">{input}{label}</label>',
                                        'checkAll'=>Yii::t('app','All'),
                                ))?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a data-toggle="collapse" data-target="#collapseCategory" class="accordion-toggle collapsed">
                                <i class="icon-list-alt"></i> Categories:
                            </a>
                        </div>
                        <div id="collapseCategory" class="accordion-body collapse"  style="height: 0px;">
                            <div class="accordion-inner">
                                <?php echo CHtml::checkBoxList(
                                    'category',
                                    array('Software', 'Network'),
                                    array('Software'=>'Software', 'Network'=>'Network'),
                                    array(
                                        'separator'=>'',
                                        'template'=>'<label class="checkbox">{input}{label}</label>',
                                        'checkAll'=>Yii::t('app','All'),
                                ))?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a data-toggle="collapse" data-target="#collapsePrice" class="accordion-toggle collapsed">
                                <i class="icon-signal"></i> Prices:
                            </a>
                        </div>
                        <div id="collapsePrice" class="accordion-body collapse"  style="height: 0px;">
                            <div class="accordion-inner">
                                <?php echo CHtml::checkBoxList(
                                    'prices',
                                    array('250', '500'),
                                    array('250'=>'250$', '500'=>'500$'),
                                    array(
                                        'separator'=>'',
                                        'template'=>'<label class="checkbox">{input}{label}</label>',
                                        'checkAll'=>Yii::t('app','All'),
                                ))?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a data-toggle="collapse" data-target="#collapseTime" class="accordion-toggle collapsed">
                                <i class="icon-time"></i> Duration:
                            </a>
                        </div>
                        <div id="collapseTime" class="accordion-body collapse"  style="height: 0px;">
                            <div class="accordion-inner">
                                <?php echo CHtml::checkBoxList(
                                    'duration',
                                    array('6months', '1week'),
                                    array('6months'=>'Over 6 months', '1week'=>'Less than a week'),
                                    array(
                                        'separator'=>'',
                                        'template'=>'<label class="checkbox">{input}{label}</label>',
                                        'checkAll'=>Yii::t('app','All'),
                                ))?>
                            </div>
                        </div>
                    </div>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>  <!--Filter-->

<script type="text/javascript">
    $('#search-btn').click(function(event){
        /*
        event.preventDefault();
        var keyword = $('#keyword').val();
        //console.log(keyword);

        $.post('<?php echo Yii::app()->request->baseUrl; ?>/job/search', {'keyword':keyword}, function(data){
            //update ket qua
            console.log(data);
            $('#search-result').html(data);
        });
         */
    });
</script>
