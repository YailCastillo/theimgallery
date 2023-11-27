<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use app\models\UploadForm;

$this->title = 'Upload';
$this->params['breadcrumbs'][] = $this->title;

$date = date("d/m/y")
?>
<body>
    <!-- Container -->
    <div class="d-flex flex-column align-items-center container-fluid">

        <!-- Profile container -->
        <div class="d-flex flex-column align-items-center py-4 px-5 container-fluid rounded-3 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">

            <div class="site-contact text-white">
                <h1 class=""><?= Html::encode($this->title) ?></h1>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'img_title')->label('Title')->textInput(['maxlength' => true, 'autocomplete' => 'off', 'class' => 'form-control text-white bg-dark border border-secondary']) ?>

                <?= $form->field($model, 'img_capt')->label('Caption')->textarea(['maxlength' => true, 'autocomplete' => 'off', 'class' => 'form-control text-white bg-dark border border-secondary', 'rows' => 7, 'style' => 'resize: none;']) ?>

                <?= $form->field($model, 'archivo')->fileInput(['class' => 'form-control text-white border-secondary bg-dark']) ?>

                <?= Html::submitButton('Upload Image', ['class' => 'btn bg-black text-white']) ?>

                <div class="mt-3" style="border-top: solid #464646 1px;">
                    <?= $form->field($model, 'img_date')->label(false)->textInput(['maxlength' => true, 'autocomplete' => 'off', 'value' => $date, 'disable' => true, 'readonly' => true, 'class' => 'form-control-plaintext text-secondary px-0 py-0 pe-none']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>

    </div>
    
</body>