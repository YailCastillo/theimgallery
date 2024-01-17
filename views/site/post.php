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
        <div class="d-flex flex-column align-items-center py-3 px-5 container-fluid rounded-4 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">

            <!-- Back button -->
            <div class="me-auto">
                <?= Html::a('<i class="bi bi-arrow-left-circle me-1"></i>Back', $_SERVER['HTTP_REFERER'], ['class' => 'back-btn no-format d-flex align-items-center']) ?>
            </div>

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
                    <div class="d-flex justify-content-between lh-1 pt-2" style="border-top: solid #464646 1px;">
                        <?= Html::tag('p', Html::encode($image->img_date), ['class' => 'text-secondary', 'style' => 'font-size: 75%;']) ?>

                        <div class="pb-3 d-flex align-items-center">
                            <?= Html::a('<i class="bi bi-hand-thumbs-up"></i> 0', ['postedit', 'img_id' => $image->img_id], ['class' => 'me-2 like-btn']) ?>
                            <?= Html::a('<i class="bi bi-chat"></i> 0', ['postedit', 'img_id' => $image->img_id], ['class' => 'like-btn']) ?>
                        </div>
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