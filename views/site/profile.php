<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<body>
    <!-- Container -->
    <div class="d-flex flex-column align-items-center container-fluid">

        <!-- Profile container -->
        <div class="d-flex flex-column align-items-center py-4 px-5 container-fluid rounded-4 shadow-lg" style="height: auto; width: 50rem; background-color: #212529;">

            <!-- Bio container -->
            <div class="position-relative my-2 rounded-4 shadow bg-black" style="width: 45rem; height: 15rem">
                <div class="position-absolute top-50 start-50 translate-middle container-fluid d-flex justify-content-evenly align-items-center">
                    <div class="rounded-circle border border-4" style="width: 10rem; height: 10rem;">
                        <img class="rounded-circle p-1" style="width: 100%; height: 100%; object-fit: cover;" src="../../images/tony_tony.png" alt="">
                    </div>
                    <div class="text-white " style="border: solid white 1px; width: 25rem; height: 8rem;">
                        <!-- Title -->
                        <div class="container fw-bold">
                            <?= Html::tag('p', Html::encode(Yii::$app->user->identity->username)) ?>
                        </div>
                        <!-- Bio -->
                        <div class="container">
                            <p>asdasdasd</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User images container -->
            <div class="container my-2 py-4 rounded-4 shadow bg-black" style="width: auto; height: auto">
                
                <!-- Images grid -->
                <div class="d-flex flex-wrap container">
                    <div class="my-1 mx-1" style="width: 13rem; height: 14rem;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="../../images/mono.jpg" alt="mono">
                    </div>
                    <div class="my-1 mx-1" style="width: 13rem; height: 14rem;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="../../images/chopper_wano.jpg" alt="chopper">
                    </div>
                    <div class="my-1 mx-1" style="width: 13rem; height: 14rem;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="../../images/JwBunny.png" alt="chopper">
                    </div>
                    <div class="my-1 mx-1" style="width: 13rem; height: 14rem;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="../../images/leche.jpg" alt="chopper">
                    </div>
                    <div class="my-1 mx-1" style="width: 13rem; height: 14rem;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="../../images/tony_tony.png" alt="chopper">
                    </div>
                    <div class="my-1 mx-1" style="width: 13rem; height: 14rem;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="../../images/liconsa.jpg" alt="chopper">
                    </div>
                </div>

            </div>

        </div>

    </div>
    
</body>
