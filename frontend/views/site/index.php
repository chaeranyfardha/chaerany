b <?php

use yii\widgets\ListView;
use yii\widgets;
use Faker\Provider;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<!--<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-md-9" style="min-height: 600px;">
                <?php
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_itemview',
                ]);
                ?>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success" style="width: 100%; margin-bottom: 20px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Category</h3>
                    </div>
                    <div class="panel-body">
                        <?= $category ?>
                    </div>
                </div>
                <div class="panel panel-success" style="width: 100%; margin-bottom: 20px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tags</h3>
                    </div>
                    <div class="panel-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
