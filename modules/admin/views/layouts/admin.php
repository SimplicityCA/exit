<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'EXIT',
                'brandUrl' => Yii::$app->homeUrl.'admin',
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            if(!Yii::$app->user->isGuest){
	            echo Nav::widget([
	                'options' => ['class' => 'navbar-nav navbar-right'],
	                'items' => [
	                	['label'=>'Reservas', 'url'=>['/admin/reserve']],
                        ['label'=>'Parámetros', 'url'=>['/admin/params']],
                        ['label'=>'Clientes', 'url'=>['/admin/client']],
                        ['label'=>'Contenidos', 'url'=>['/admin/content']],
                        ['label'=>'Imágenes', 'url'=>['/admin/picture']],
                        ['label'=>'Juegos', 'url'=>['/admin/game']],
                        ['label'=>'Noticias', 'url'=>['/admin/news']],
                        ['label'=>'Tickets', 'url'=>['/admin/ticket']],
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['default/logout'],
                            'linkOptions' => ['data-method' => 'post']],
	                ],
	            ]);
	        }
	        else{
	        	echo Nav::widget([
	                'options' => ['class' => 'navbar-nav navbar-right'],
	                'items' => [
	                    ['label' => 'Login', 'url' => ['/admin/default/login']],
	                ],
	            ]);
	        }
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
            	'homeLink' => ['label'=>'Inicio', 'url'=>['/admin']],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Exit <?= date('Y') ?></p>
            <p class="pull-right">Powered by <a href="http://simplicityuniverse.com" target="_blank">Simplicity</a></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
