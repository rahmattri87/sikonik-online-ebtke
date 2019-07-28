<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application xxx';

?>
<link rel="shortcut icon" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/common/img/favicon.ico" type="image/x-icon" />
<div class="site-index">
<?php
    // echo Yii::app()->request->baseUrl."<br/>" ;
    // print_r(Yii::app()->request->baseUrl);
    // echo "<br/>";
    // var_dump(Yii::app()->getBaseUrl(true));
    // echo "<br/>";
    // echo Yii::app()->request->getBaseUrl(true);

    //echo Yii::$app->getUrlManager()->getBaseUrl();
    //echo Yii::$app->getUrlManager()->getBaseUrl();
    
    //exit();
?>
    <?php \insolita\wgadminlte\LteBox::begin([
             'type'=>\insolita\wgadminlte\LteConst::TYPE_INFO,
             'isSolid'=>true,
             'boxTools'=>'<button class="btn btn-success btn-xs create_button" ><i class="fa fa-plus-circle"></i> Add</button>',
             'tooltip'=>'this tooltip description',
             'title'=>'Manage users',
             'footer'=>'total 44 active users',
         ])?>
        ANY BOX CONTENT HERE
    <?php \insolita\wgadminlte\LteBox::end()?>
    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
