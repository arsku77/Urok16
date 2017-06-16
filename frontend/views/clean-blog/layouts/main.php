<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);//pajungiami resursai ir nustatomos kai kurių resursų priklausomybės
?>


<?php $this->beginPage()//prasideda buferizacija ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language //formuojama kalbos tag'as?>">

<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() //bus sugeneruoti tokinai?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()//atspausdinama head žymė ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>
<?php $this->beginBody()//atspausdinama turinio pražios žymė ?>





    <!-- Navigation -->
<?php
NavBar::begin([//atidarome navigacinį meniu
    'brandLabel' => 'My Company',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
      'class' => 'navbar navbar-collapse navbar-custom navbar-fixed-top',
          'div' => [
          'class' => 'collapse navbar-collapse',
          'id' => 'bs-example-navbar-collapse-1',
            'div' => [
            'class' => 'container-fluid',
                'div' => [
                'class' => 'navbar-header page-scroll',
                    'button' => [
                    'type' => 'button',
                    'class' => 'navbar-toggl',
                    'data-toggle' => 'collapse',
                    'data-targe' => '#bs-example-navbar-collapse-1',
                            'span' => [
                            'class' => 'sr-only',
                            'Toggle navigation',
                            ],
                    'Menu',
                        'i' => [
                        'class' => 'fa fa-bars',
                        ],
                    ],

                ],
            ],
        ],
    ],
]);

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']],
    ['label' => 'Post', 'url' => ['/site/post']],
];

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'nav navbar-nav navbar-right',],
    'items' => $menuItems,
]);
NavBar::end();//uždarom meniu juostą


?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/files/themes/clean-blog/photos/gallery/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">

        <?= Alert::widget()//apdoroja sessijų pranešimus ir parodo juos ?>
        <?= $content //pagrindinis turinys?>

    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
<!--    <script src="other/clean-blog/vendor/jquery/jquery.min.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
<!--    <script src="other/clean-blog/vendor/bootstrap/js/bootstrap.min.js"></script>-->

    <!-- Contact Form JavaScript -->
<!--    <script src="js/clean-blog/jqBootstrapValidation.js"></script>-->
<!--    <script src="js/clean-blog/contact_me.js"></script>-->

    <!-- Theme JavaScript -->
<!--    <script src="js/clean-blog/clean-blog.min.js"></script>-->
<?php $this->endBody()//turinio formavimo pabaiga - pajungiamas ajax(js...) ?>

</body>

</html>
<?php $this->endPage()//baigiasi buferizacija - pajungiami visi reikalingi failai ?>