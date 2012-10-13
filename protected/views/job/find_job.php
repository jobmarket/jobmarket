<div class="span9 pull-left"> <!--Search-->
    <div class="thumbnail"> <!--Search Box-->
        <form class="form-search">
            <div class="input-append">
                <input type="text" class="span5 search-query" placeholder="Keywords">
                <button class="btn" type="submit">Search</button>
            </div>
            <label class="checkbox">
                <input type="checkbox"> Use Filter
            </label>
        </form>
    </div>  <!--Search Box-->
    <div class="">  <!--Sort & Paging-->
        <div class="span5">
            Sort by:
            <select class="">
                <option>Newest</option>
                <option>Most Paid</option>
            </select>
        </div>
        <div class="pagination">
            <ul>
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>  <!--Sort & Paging-->

    <div class=""> <!--Search Result-->
        <div class="thumbnail"> <!--Result Item 1-->
            <div class="">
                Title: <a href="<?php echo Yii::app()->request->baseUrl; ?>/job/view?as=freelancer">This is a job (view detail as freelancer)</a>
                Title: <a href="<?php echo Yii::app()->request->baseUrl; ?>/job/view?as=client">This is a job (view detail as client)</a>
            </div>
            <div class="">
                Skill:
            </div>
            <div class="">
                Price:
            </div>
            <div class="">
                Description:
            </div>
            <div class="">
                <button class="btn btn-primary">Apply</button>
                <button class="btn btn-info">Share</button>
            </div>
        </div> <!--Result Item 1-->
        <br/>
    </div>  <!--Search Result-->
    <div class="">  <!--Sort & Paging-->
        <div class="span5">

            Sort by:

            <select class="">

                <option>Newest</option>

                <option>Most Paid</option>

            </select>

        </div><!--Sort-->

        <div class="pagination">

            <ul>

            <li><a href="#">Prev</a></li>

            <li><a href="#">1</a></li>

            <li><a href="#">2</a></li>

            <li><a href="#">3</a></li>

            <li><a href="#">4</a></li>

            <li><a href="#">Next</a></li>

            </ul>

        </div>

    </div>  <!--Sort & Paging-->

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

                            <a data-toggle="collapse" data-target="#collapseCategory" class="accordion-toggle collapsed">

                                <i class="icon-list-alt"></i> Location:

                            </a>

                        </div>

                        <div id="collapseCategory" class="accordion-body collapse"  style="height: 0px;">

                            <div class="accordion-inner">

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        All

                                </label>

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        Ho Chi Minh

                                </label>

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        Ha Noi

                                </label>

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

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        All

                                </label>

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        Software

                                </label>

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        Network

                                </label>

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

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        All

                                </label>

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        250$

                                </label>

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        500$

                                </label>



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

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        All

                                </label>

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        Over 6 months

                                </label>

                                <label class="checkbox">

                                    <input type="checkbox" value="Software">

                                        Less than a week

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

</td>

            </tr>



        </tbody>

    </table>

</div>  <!--Filter-->
