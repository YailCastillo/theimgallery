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
    <div class="d-flex flex-column align-items-center py-4 px-5 container-fluid rounded-3 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">
        
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