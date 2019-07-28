    <!-- Box ------------------------------------------------------------- -->

    <?php \insolita\wgadminlte\LteBox::begin([
             'type'=>\insolita\wgadminlte\LteConst::TYPE_INFO,
             'isSolid'=>true,
             'boxTools'=>'<button class="btn btn-success btn-xs create_button" ><i class="fa fa-plus-circle"></i> Add</button>',
             'tooltip'=>'this tooltip description',
             'title'=>'Manage users [Box]',
             'footer'=>'total 44 active users',
         ])?>
        ANY BOX CONTENT HERE
    <?php \insolita\wgadminlte\LteBox::end()?>

    <!-- Attention ------------------------------------------------------------- -->
    
    <?php 
        // \insolita\wgadminlte\CollapseBox::begin([
        //      'type'=>\insolita\wgadminlte\LteConst::TYPE_INFO,
        //      'collapseRemember' => true,
        //      'collapseDefault' => false,
        //      'isSolid'=>true,
        //      'boxTools'=>'<button class="btn btn-success btn-xs create_button" ><i class="fa fa-plus-circle"></i> Добавить</button>',
        //      'tooltip'=>'Описание содаржимого',
        //      'title'=>'Управление пользователями',])
             ?>
        ANY BOX CONTENT HERE
    <?php 
        // \insolita\wgadminlte\LteBox::end()
    ?>

    <?php \insolita\wgadminlte\LteBox::begin([
               'type'=>\insolita\wgadminlte\LteConst::COLOR_MAROON,
               'tooltip'=>'Useful information!',
               'title'=>'Attention! [Attention]',
               'isTile'=>true
           ])?>
        ANY BOX CONTENT HERE
         ANY BOX CONTENT HERE 
   <?php \insolita\wgadminlte\LteBox::end()?>    
   
   <!-- ------------------------------------------------------------- -->
   
   <?php echo \insolita\wgadminlte\LteSmallBox::widget([
                       'type'=>\insolita\wgadminlte\LteConst::COLOR_LIGHT_BLUE,
                       'title'=>'90%',
                       'text'=>'Free Space',
                       'icon'=>'fa fa-cloud-download',
                       'footer'=>'See All <i class="fa fa-hand-o-right"></i>',
                    //    'link'=>Url::to("/site/login")
                   ]);?>
    
    <!-- ------------------------------------------------------------- -->

    <?php echo \insolita\wgadminlte\LteInfoBox::widget([
                      'bgIconColor'=>\insolita\wgadminlte\LteConst::COLOR_AQUA,
                      'bgColor'=>'',
                      'number'=>100500,
                      'text'=>'Test Three',
                      'icon'=>'fa fa-bolt',
                      'showProgress'=>true,
                      'progressNumber'=>66,
                      'description'=>'Something about this'
                  ])?>

    <!-- ------------------------------------------------------------- -->

    <?php \insolita\wgadminlte\Callout::widget([
                'type'=>\insolita\wgadminlte\LteConst::TYPE_WARNING,
                'head'=>'Operation Complete',
                'text'=>'Something text bla-bla-bla bla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-blabla-bla-bla'
            ]);?>
    <?php \insolita\wgadminlte\Callout::begin([
                'type'=>\insolita\wgadminlte\LteConst::TYPE_WARNING,
                'head'=>'Operation Complete'
            ]);?>
    <?php \insolita\wgadminlte\Callout::end()?>

    <!-- ------------------------------------------------------------- -->
    <?=\insolita\wgadminlte\Alert::widget([
              'type'=>\insolita\wgadminlte\LteConst::TYPE_SUCCESS,
              'text'=>'Operation Complete',
              'closable'=>true
          ]);?>
    <?php
    \insolita\wgadminlte\Alert::begin([
                 'type'=>\insolita\wgadminlte\LteConst::TYPE_SUCCESS,
                 'closable'=>true
             ]);?>
    Some alert message
    <?php \insolita\wgadminlte\Alert::end()?>

    <!-- ------------------------------------------------------------- -->
    <!-- Add in layout -->
    <?=\insolita\wgadminlte\FlashAlerts::widget([
                'errorIcon'=>'<i class="fa fa-warning"></i>',
                'successIcon'=>'<i class="fa fa-check"></i>',
                'successTitle'=>'Done!',
                'closable'=>true,
                'encode'=>false,
                'bold'=>false
                ]);?>

    <!-- And set flash messages anywhere -->
    <!-- Yii::$app->session->setFlash('info1','Message1');
    Yii::$app->session->setFlash('info2','Message2');
    Yii::$app->session->setFlash('info3','Message3');
    Yii::$app->session->setFlash('success-first','Message');
    Yii::$app->session->setFlash('success-second','Message'); -->

    <!-- ------------------------------------------------------------- -->

    <?php 
   \insolita\wgadminlte\LteChatBox::begin([
       'type' => \insolita\wgadminlte\LteConst::TYPE_PRIMARY,
       'footer'=>'<input type="text" name="newMessage">',
       'title'=>'Messages',
       'boxTools' => '<button class="btn btn-xs"><i class="fa fa-refresh"></i></button>'
       ]);
      echo \insolita\wgadminlte\LteChatMessage::widget([
          'isRight' => false,
          'author' => 'Artur Green',
          'message' => 'Some message bla-bla',
          'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user3-128x128.jpg',
          'createdAt' => '5 minutes ago'
    ]);
      echo  \insolita\wgadminlte\LteChatMessage::widget([
                'isRight' => true,
                'author' => 'Jane Smith',
                'message' => 'Some message bla-bla',
                'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg',
                'createdAt' => '2017-23-03 17:33'
      ]);
        \insolita\wgadminlte\LteChatBox::end();
    ?>

    <!-- ------------------------------------------------------------- -->

    <?php
    \insolita\wgadminlte\LteSetup::widget([
        'animationSpeed' => 'fast',
        'enableFastclick' => false,
        'navbarMenuSlimscroll'=>true
        //etc...
    ]);
    ?>