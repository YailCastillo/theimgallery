<?php

/** @var yii\web\View $this */
/** @var app\models\Image $model */

use yii\helpers\Html;
use app\models\UserGallery;
use PHPUnit\Framework\MockObject\Builder\Identity;
use app\models\Image;
use Symfony\Component\Mime\Encoder\EncoderInterface;

$this->title = 'TheIMGallery';
?>
<body>
    <!-- Container -->
    <div class="d-flex flex-column align-items-center container-fluid">

        <!-- Feed container -->
        <div class="d-flex flex-column align-items-center py-4 px-5 container-fluid rounded-4 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">

            <!-- Post container -->
            <?php foreach ($model as $post) { ?>
            <div class="d-flex flex-column my-2 rounded-4 shadow bg-black text-light container-fluid" style="max-width: 25rem; height: auto;">

                <!-- User -->
                <div class="lh-1 pt-2 fw-bold">
                    <?= Html::tag('p', Html::encode(Yii::$app->user->identity->username)) ?>
                </div>

                <!-- IMG -->
                <div class="px-0 d-flex justify-content-center" style="width: auto; min-height: 25rem;">
                    <img class="img-fluid" src= "../../web/<?= Html::encode($post->img_img) ?>" alt=""/>
                </div>

                <!-- Title -->
                <div class="fw-bold pt-2">
                    <?= Html::encode($post->img_title) ?>
                </div>

                <!-- Caption -->
                <div class="py-0 text-break" style="max-height: 5rem;">
                    <?= Html::tag('p', Html::encode($post->img_capt)) ?>
                </div>

                <!-- Date -->
                <div class="lh-1 pt-2 text-secondary" style="font-size: 75%; border-top: solid #464646 1px;">
                    <?= Html::tag('p', Html::encode($post->img_date)) ?>
                </div>
            </div>
            <?php }?>
    </div>

    <p><?= Html::a('Upload', ['upload'], ['class' => 'fixed-bottom btn btn-lg btn-dark bg-black my-3 mx-3 rounded-4', 'style' => 'width: 8%;']) ?></p>

</body>

