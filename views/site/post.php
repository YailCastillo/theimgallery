<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use PHPUnit\Framework\MockObject\Builder\Identity;
use app\models\Image;
use yii\widgets\ActiveForm;

$this->title = $image->img_title;
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
                    <img class="rounded-3" style="width: 100%; height: 100%; object-fit: cover;" src= "../../web/<?= Html::encode($image->img_img) ?>" alt="<?= Html::encode($image->img_img) ?>"/>
                </div>

                <div class="position-relative" style="min-width: 15rem">
                    <!-- User -->
                    <div class="lh-1 pt-2 fw-bold">
                        <?= Html::tag('p', Html::encode($image->img_user)) ?>
                    </div>

                    <!-- Title -->
                    <div class="fw-bold pt-2">
                        <?= Html::encode($image->img_title) ?>
                    </div>

                    <!-- Caption -->
                    <div class="py-0 text-break" style="height: auto;">
                        <?= Html::tag('p', Html::encode($image->img_capt)) ?>
                    </div>

                    <!-- Date -->
                    <div class="lh-1 pt-2 text-secondary" style="font-size: 75%; border-top: solid #464646 1px;">
                        <?= Html::tag('p', Html::encode($image->img_date)) ?>
                    </div>

                    <?php if (Yii::$app->user->isGuest || $image->prof_id != Yii::$app->user->identity->id) {
                        echo "";
                    } else { ?>
                        <div class="position-absolute bottom-0">
                            <?= Html::a('Delete <i class="bi bi-trash-fill ms-1"></i>', ['delete', 'img_id' => $image->img_id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this post?', 'method' => 'post']]) ?>
                            
                            <?= Html::a('Edit <i class="bi bi-pencil-fill ms-1"></i>', ['postedit', 'img_id' => $image->img_id], ['class' => 'btn btn-primary']) ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>