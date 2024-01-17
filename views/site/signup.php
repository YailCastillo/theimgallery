<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use app\models\SignupForm;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Container -->
<div class="d-flex flex-column align-items-center container-fluid">

    <!-- Login container -->
    <div class="d-flex flex-column align-items-center py-3 px-5 container-fluid rounded-3 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">

        <!-- Back button -->
        <div class="me-auto">
            <?= Html::a('<i class="bi bi-arrow-left-circle me-1"></i>Back', $_SERVER['HTTP_REFERER'], ['class' => 'back-btn no-format d-flex align-items-center']) ?>
        </div>
        
        <div class="site-login text-white bg-black p-5 rounded-4">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Please fill out the following fields to login:</p>

            <div>
                <div>

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'autocomplete' => 'off']) ?>

                    <?= $form->field($model, 'email')->textInput(['type' => 'email', 'autocomplete' => 'off']) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group">
                        <div>
                            <?= Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>