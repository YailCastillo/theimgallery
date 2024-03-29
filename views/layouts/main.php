<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

use app\models\Profile;
use Symfony\Component\Mime\Encoder\EncoderInterface;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php

    Yii::$app->user->isGuest ? "" : $profile = Profile::findOne(['id' => Yii::$app->user->identity->id]);

    NavBar::begin([
        'brandLabel' => Html::tag('div', Html::encode(Yii::$app->name) ,['class' => 'font-title fw-bold']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-black fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto d-flex align-items-center'],
        'items' => [
            Yii::$app->user->isGuest
                ? Html::a('Login', ['login'], ['class' => 'btn btn-sm btn-dark fw-bold me-2']) . Html::a('Signup', ['signup'], ['class' => 'btn btn-light fw-bold'])
                : '<div class="dropdown nav-link logout py-0">
                        <div class="dropdown-toggle d-flex align-items-center fst-normal" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">'
                            . Html::encode(Yii::$app->user->identity->username)
                            . Html::img("../../$profile->prof_img", ['class' => 'rounded-circle my-0 ms-2', 'style' => 'width: 2rem; height: 2rem; object-fit: cover; padding: .1rem;']) .
                        '</div>
                        <li class="nav-item text-white">
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li class="">'
                                    . Html::a('Profile <i class="bi bi-person-fill"></i>', ['profile?prof_id=' . Yii::$app->user->identity->id], ['class' => 'dropdown-item profile-btn-nav']).
                                '</li>
                                <li><hr class="dropdown-divider"></li>
                                <li class=" px-0 py-0">'
                                    . Html::beginForm(['/site/logout'])
                                    . Html::submitButton('Logout <i class="bi bi-door-open-fill"></i>',
                                        ['class' => 'dropdown-item delete-btn-nav']
                                    )
                                    . Html::endForm() .         
                                '</li>
                            </ul>
                        </li>
                    </div>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-dark">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
