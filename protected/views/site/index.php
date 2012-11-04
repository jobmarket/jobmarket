<?php $this->pageTitle = Yii::app()->name ?>
<div class="row">
  <div class="container-fluid">
    <div class="row-fluid">
        <div class="span3"><!--Categories-->
            <ul class="nav nav-tabs nav-stacked">

              <?php foreach ($categories as $key => $value) {?>
                  <li class=""><a href="#dropdowns"><?php echo $value->name ?> <i class="icon-chevron-right pull-right"></i></a></li>
              <?php }?>
            </ul>
        </div><!--Categories-->
        <div class="span9"><!--sliders-->
            <div class="carousel slide" id="myCarousel">
                <div class="carousel-inner">
                  <div class="item">
                    <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/carousels/bootstrap-mdo-sfmoma-01.jpg">
                    <div class="carousel-caption">
                      <h4>First Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>
                  <div class="item">
                    <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/carousels/bootstrap-mdo-sfmoma-02.jpg">
                    <div class="carousel-caption">
                      <h4>Second Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>
                  <div class="item active">
                    <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/carousels/bootstrap-mdo-sfmoma-03.jpg">
                    <div class="carousel-caption">
                      <h4>Third Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>
                </div>
                <a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
                <a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
            </div>
        </div><!--sliders-->
    </div>
  </div>
</div>
<div class="row"><!--row how it works-->
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo_how_it_work.jpg">
</div><!--row-->
<div class="row"><!--recently-->
	<div class="row-fluid show-grid">
	  <div class="span6">Recently Tasks</div>
	  <div class="span6">Top contructors</div>
	</div>
</div><!--row-->
