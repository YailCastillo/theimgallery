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
        <div class="d-flex flex-column align-items-center py-4 px-5 container-fluid rounded-4 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">

            <div class="bg-black px-5 py-4 rounded-4 shadow">
                <div class="site-contact text-white">

                    <?php $form = ActiveForm::begin(); ?>
                    
                    <div class="d-flex justify-content-between">
                        <div>
                            <h1 class=""><?= Html::encode($username) ?></h1>
                            <p class="text-secondary px-0 py-0 pe-none">Update</p>
                        </div>

                        <div>
                            <img class="border border-white border-3 p-1 rounded-circle" style="width: 8rem; height: 8rem; object-fit: cover;" src="
                                <?php if ($profile->prof_img != 'images/user_icon.jpg') { ?>
                                    <?= Html::encode("../../web/$profile->prof_img") ?>
                                <?php }else { ?>
                                    <?= Html::encode("../../$profile->prof_img") ?>
                                <?php } ?>"/>
                        </div>
                    </div>

                    <?= $form->field($profile, 'prof_bio')->label('Biography', ['class' => 'text-white pb-1'])->textarea(['maxlength' => true, 'autocomplete' => 'off', 'class' => 'form-control text-light bg-dark border border-secondary', 'rows' => 5, 'style' => 'resize: none;']) ?>

                    <?= $form->field($profile, 'profpic')->label(false)->fileInput(['class' => 'form-control text-white border-secondary bg-dark']) ?>

                    <?= Html::submitButton('Save', ['class' => 'btn btn-light border-secondary']) ?>

                    <div class="mt-3" style="border-top: solid #464646 1px;">
                        <?= $form->field($profile, 'img_date')->label(false)->textInput(['maxlength' => true, 'autocomplete' => 'off', 'value' => $date, 'disable' => true, 'readonly' => true, 'class' => 'form-control-plaintext text-secondary px-0 py-0 pe-none']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>

    </div>
    
</body>