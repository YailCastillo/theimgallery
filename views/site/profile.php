<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\Image;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<body>
    <!-- Container -->
    <div class="d-flex flex-column align-items-center container-fluid">

        <!-- Profile container -->
        <div class="d-flex flex-column align-items-center py-4 px-5 container-fluid rounded-4 shadow-lg" style="height: auto; max-width: 50rem; background-color: #212529;">

            <!-- Bio container -->
            <div class="container-fluid my-2 rounded-4 shadow bg-black" style="max-width: 45rem; max-height: 15rem">
                <div class="row row-cols-2 row-cols-lg-2 border border-white" style="height: 10rem;">
                    <div class="m-auto">
                        <img class="col border border-white d-flex rounded-circle p-1" style="max-width: auto; max-height: auto; object-fit: cover;" src="../../images/tony_tony.png"/>
                    </div>
                    <div class="col border border-white">
                        <div class="col border border-white">Column</div>
                        <div class="col border border-white">Column</div>
                    </div>
                </div>
            </div>

            <!-- User images container -->
            <div class="container my-2 py-3 px-4 rounded-4 shadow bg-black" style="max-width: 40rem; max-height: auto">

                <!-- Images grid -->
                <div class="container gx-1 gy-1">
                    <div class="row">
                        <?php foreach ($model as $post) { ?>
                        <div class="m-auto col-4 gx-2 my-1" style="max-width: 13rem; max-height: 13rem;">
                            <img class="rounded-1" style="width: 100%; height: 100%; object-fit: cover;" src= "../../web/<?= Html::encode($post->img_img)?>" alt="">
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
</body>
