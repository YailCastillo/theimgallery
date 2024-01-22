<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use app\models\UpdateForm;
use app\models\Profile;
use app\models\User;

$this->title = 'Update';
$this->params['breadcrumbs'][] = $this->title;

$date = date("d/m/y");
$username = (Yii::$app->user->identity->username);

?>
<body>
    <!-- Container -->
    <div class="d-flex flex-column align-items-center container-fluid">

        <!-- Profile container -->
        <div class="d-flex flex-column align-items-center py-3 px-5 container-fluid rounded-4 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">

            <!-- Back button -->
            <div class="me-auto">
                <?= Html::a('<i class="bi bi-arrow-left-circle me-1"></i>Back', $_SERVER['HTTP_REFERER'], ['class' => 'back-btn no-format d-flex align-items-center']) ?>
            </div>

            <!-- Form Container -->
            <div class="bg-black px-5 py-4 rounded-4 shadow">
                <div class="site-contact text-white">

                    <?php $form = ActiveForm::begin(); ?>
                    
                    <div class="d-flex justify-content-between">
                        <!-- Username -->
                        <div>
                            <h1 class=""><?= Html::encode($username) ?></h1>
                            <p class="text-secondary px-0 py-0 pe-none">Update</p>
                        </div>

                        <!-- Actual Profile Pic -->
                        <div>
                            <img class="border border-white border-3 p-1 rounded-circle" style="width: 8rem; height: 8rem; object-fit: cover;" src="../../<?= Html::encode($profile->prof_img)?>"/>
                        </div>
                    </div>

                    <!-- Biography field -->
                    <?= $form->field($profile, 'prof_bio')->label('Biography', ['class' => 'text-white pb-1'])->textarea(['maxlength' => true, 'autocomplete' => 'off', 'class' => 'form-control text-light bg-dark border border-secondary', 'rows' => 5, 'style' => 'resize: none;']) ?>

                    <!-- New Profile Pic file input -->
                    <?= $form->field($profile, 'profpic')->label(false)->fileInput(['class' => 'form-control text-white border-secondary bg-dark']) ?>

                    <!--, ['class' => 'form-check-input rounded-3', 'value' => '--lightgray', 'style' => 'width: 3rem; height: 3rem; background-color: var(--white);']-->

                    <!-- Profile Colors -->
                    Profile color
                    <div class="border border-1 border-secondary rounded-2 bg-dark d-flex justify-content-evenly align-item-center">
                        <?= $form->field($profile, 'prof_color', ['options' => ['class' => 'my-3']])->label(false)->radioList([
                            '--lgray' => '<div class="me-2 rounded-3 shadow-inner d-flex" style="width: 3rem; height: 3rem; background-color: var(--lgray);"></div>',
                            '--black' => '<div class="me-2 rounded-3 shadow-inner" style="width: 3rem; height: 3rem; background-color: var(--black);"></div>',
                            '--pink' => '<div class="me-2 rounded-3 shadow-inner" style="width: 3rem; height: 3rem; background-color: var(--pink);"></div>',
                            '--blue' => '<div class="me-2 rounded-3 shadow-inner" style="width: 3rem; height: 3rem; background-color: var(--blue);"></div>',
                            '--yellow' => '<div class="me-2 pe-1 rounded-3 shadow-inner" style="width: 3rem; height: 3rem; background-color: var(--yellow);"></div>',
                        ], ['tag' => 'array', 'encode' => false, 'separator' => '<div class="mx-2"></div>','class' => 'd-flex flex-row align-items-center', 'style' => 'width: 100%;', 'itemOptions' => ['class' => 'form-check-input mt-3']]) ?>
                    </div>

                    <?= Html::submitButton('Save <i class="bi bi-check" style="font-size: 1.3rem;"></i>', ['class' => 'd-flex align-items-center btn btn-success px-2 py-1 mt-3']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>

    </div>
    
</body>