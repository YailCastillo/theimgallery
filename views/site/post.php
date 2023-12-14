<?php

/** @var yii\web\View $this */  
/** @var app\models\UploadForm $model */

use yii\helpers\Html;
use app\models\UserGallery;
use PHPUnit\Framework\MockObject\Builder\Identity;

$this->title = $model->img_title;
?>
<body>
    <!-- Main container -->
    <div class="d-flex flex-column align-items-center container-fluid">

        <!-- Feed container -->
        <div class="d-flex flex-column align-items-center py-4 px-5 container-fluid rounded-4 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">

            <!-- Post container -->
            <div class="d-flex my-2 py-3 rounded-4 shadow bg-black text-light container-fluid justify-content-center" style="width: auto; height: auto;">
            
                <!-- IMG -->
                <div class="me-3 d-flex justify-content-center" style="width: auto; min-height: 25rem; max-width: 25rem;">
                    <img class="rounded-3" style="width: 100%; height: 100%; object-fit: cover;" src= "../../web/<?= Html::encode($model->img_img) ?>" alt="<?= Html::encode($model->img_img) ?>"/>
                </div>

                <div class="position-relative" style="min-width: 15rem">
                    <!-- User -->
                    <div class="lh-1 pt-2 fw-bold">
                        <?= Html::tag('p', Html::encode($model->img_user)) ?>
                    </div>

                    <!-- Title -->
                    <div class="fw-bold pt-2">
                        <?= Html::encode($model->img_title) ?>
                    </div>

                    <!-- Caption -->
                    <div class="py-0 text-break" style="height: auto;">
                        <?= Html::tag('p', Html::encode($model->img_capt)) ?>
                    </div>

                    <!-- Date -->
                    <div class="lh-1 pt-2 text-secondary" style="font-size: 75%; border-top: solid #464646 1px;">
                        <?= Html::tag('p', Html::encode($model->img_date)) ?>
                    </div>

                    <?php if (Yii::$app->user->isGuest || $model->prof_id != Yii::$app->user->identity->id) {
                        echo "";
                    } else { ?>
                        <?= Html::submitButton('Delete', ['class' => 'btn btn-danger ms-auto position-absolute bottom-0']) ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>