<?php

/** @var yii\web\View $this */  
/** @var app\models\UploadForm $model */

use yii\helpers\Html;
use app\models\UserGallery;
use PHPUnit\Framework\MockObject\Builder\Identity;

$text = "ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
$this->title = 'My Yii Application';
?>
<body>
    <!-- Main container -->
    <div class="d-flex flex-column align-items-center container-fluid">

        <!-- Feed container -->
        <div class="d-flex flex-column align-items-center py-4 px-5 container-fluid rounded-4 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">

            <!-- Post container -->
            <div class="d-flex my-2 py-3 rounded-4 shadow bg-black text-light container-fluid justify-content-center" style="max-width: auto; height: auto;">
            
                <!-- IMG -->
                <div class="me-3 d-flex justify-content-center" style="width: auto; min-height: 25rem; max-width: 25rem;">
                    <img class="img-fluid" src= "../../web/uploads/chopper_wano24_11_23_80.jpg" alt=""/>
                </div>

                <div style="max-width: 20rem">
                    <!-- User -->
                    <div class="lh-1 pt-2 fw-bold">
                        <?= Html::tag('p', Html::encode(Yii::$app->user->identity->username)) ?>
                    </div>

                    <!-- Caption -->
                    <div class="py-0 text-break" style="max-height: 5rem;">
                        <?= Html::tag('p', Html::encode($text)) ?>
                    </div>

                    <!-- Date -->
                    <div class="lh-1 pt-2 text-secondary" style="font-size: 75%; border-top: solid #464646 1px;">
                        <p>12/11/2023</p>
                    </div>
                </div>
            </div>
    </div>

</body>