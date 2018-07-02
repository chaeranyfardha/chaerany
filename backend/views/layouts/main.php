<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
use backend\assets\AdminLteAsset;
use yii\web\JsExpression;

AdminLteAsset::register($this);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        
        </head>
        <body class="skin-black sidebar-mini" style="font-size: 13px"> <!--   fixed -->
            <?php $this->beginBody() ?>
            
            
            <div class="wrapper">
                <header class="main-header">
                    <!-- Logo -->
                    <a href="<?= Url::to(['/site/index']); ?>" class="logo"  style="border-bottom: grey solid 1px;  height: 50px; background-color: #FFF;">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><?php echo Html::img('@web/img/log.png', ['style' => 'width:100%;']) ?></span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><?php echo Html::img('@web/img/log.png', ['style' => 'width:150px;']) ?></span>
                    </a>
                    <!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                            <!--<span class="sr-only">Toggle navigation</span>-->
                        </a>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                
                                <!-- Notifications: style can be found in dropdown.less -->
                                <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                    </a>
                                </li>
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                      <?php echo Html::img('@web/img/log.png', ['class' => 'user-image','alt' => 'User Image']); ?>
                                      <span class="hidden-xs">Profile</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                      <!-- User image -->
                                      <li class="user-header bg-blue-gradient">
                                        <?php echo Html::img('@web/img/log.png', ['class' => 'img-circle','alt' => 'User Image']); ?>
                                        <p>
                                          Web Developer
                                          <small>Member since Nov. 2016</small>
                                        </p>
                                      </li>
                                      <!-- Menu Body -->
                                      <li class="user-body bg-black no-padding">
                                        <div class="row">
                                          <div class="col-xs-12 text-center ">
                                          </div>
                                        </div>
                                        <!-- /.row -->
                                      </li>
                                      
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                    </nav>
                </header>
                <?php
                require 'left_menu.php';
                ?>
                <div class="content-wrapper">
                    <section class="content-header">
                        <h1> 
                            <?= '&nbsp;' . $this->title ?>
                        </h1>
                        <!-- Sidebar toggle button-->
                        <?=
                        Breadcrumbs::widget([
                            'homeLink' => ['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->homeUrl, 'template' => '<li><i class="fa fa-home"></i>&nbsp;{link}</li>'],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                    </section>
                    <section class="content" style="overflow-x: auto;">
                        
                        <?= $content ?>
                    </section>
                </div>
            </div>
                <!--            <footer class="footer">
                                <div class="container">
                                    <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                
                                    <p class="pull-right"><?= Yii::powered() ?></p>
                                </div>
                            </footer>-->

                <?php $this->endBody() ?>
               
                
        </body>
    </html>
    <?php
    $this->endPage();
    
