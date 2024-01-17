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

                    <?php $form = ActiveForm::begin(); ?>
                    <!-- Title -->
                    <div class="pt-2">
                        <?= $form->field($image, 'img_title')->label('Title', ['class' => 'fw-bold text-white pb-1'])->textarea(['maxlength' => true, 'autocomplete' => 'off', 'class' => 'form-control text-light bg-dark border border-secondary', 'style' => 'resize: none;']) ?>
                    </div>

                    <!-- Caption -->
                    <div class="text-break" style="height: auto;">
                        <?= $form->field($image, 'img_capt')->label('Caption', ['class' => 'fw-bold text-white pb-1', 'value' => $image->img_capt])->textarea(['maxlength' => true, 'autocomplete' => 'off', 'class' => 'form-control text-light bg-dark border border-secondary', 'style' => 'resize: none;']) ?>
                    </div>

                    <div class="d-flex justify-content-between lh-1 pt-2" style="border-top: solid #464646 1px;">
                        <!-- Date -->
                        <div>
                            <?= Html::tag('p', Html::encode($image->img_date), ['class' => 'text-secondary', 'style' => 'font-size: 75%;']) ?>
                        </div>

                        <!-- Save button -->
                        <div>
                            <?php if (Yii::$app->user->isGuest || $image->prof_id != Yii::$app->user->identity->id) {
                                echo "";
                            } else { ?>
                                <?= Html::submitButton('Save <i class="bi bi-check" style="font-size: 1.3rem;"></i>', ['class' => 'd-flex align-items-center btn btn-success']) ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</body>