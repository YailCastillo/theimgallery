<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\Image;
use app\models\Profile;
use app\models\User;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<body>
    <!-- Container -->
    <div class="d-flex flex-column align-items-center container-fluid">

        <!-- Profile container -->
        <div class="d-flex flex-column align-items-center py-3 px-5 container-fluid rounded-4 shadow-lg" style="height: auto; max-width: 50rem; background-color: #212529;">

            <!-- Bio container -->
            <div class="container-fluid my-2 rounded-4 shadow bg-black py-4" style="max-width: 45rem; max-height: 15rem">
                <div class="d-flex justify-content-evenly ">
                    <!-- Profile pic -->
                    <img class="border border-white border-3 p-1 rounded-circle" style="width: 8rem; height: 8rem; object-fit: cover;" src="../../<?= Html::encode($profile->prof_img)?>"/>

                    <div class="position-relative d-flex flex-column text-white" style="width: 20rem;">
                        <!-- Post Counter -->
                        <div class="">
                            <h6 class="m-0">Posts</h6>
                            <?= Html::tag('div', count($image), ['class' => 'mx-auto']) ?>
                        </div>
                        <!-- Username -->
                        <div class="fw-bold">
                            <?= Html::encode($user->username) ?>
                        </div>
                        <!-- Biography -->
                        <div class="text-break">
                            <?= Html::encode($profile->prof_bio) ?>
                        </div>

                        <!-- Edit Profile Button -->
                        <div>
                            <?php
                                if (Yii::$app->user->isGuest || $profile->prof_id != Yii::$app->user->identity->id) {
                                    echo "";
                                } else { ?>
                                    <?= Html::a('Edit profile', ['update', 'prof_id' => $user->id], ['class' => 'btn btn-sm btn-dark position-absolute bottom-0']) ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User images container -->
            <div class="container my-2 py-3 px-4 rounded-4 shadow bg-black" style="max-width: 40rem; max-height: auto">

                <!-- Images grid -->
                <div class="container gx-1 gy-1">
                    <!-- Image Container-->
                    <div class="row">
                        <!-- Image post -->
                        <?php foreach ($image as $post) { ?>
                        <div class="m-auto col-4 gx-2 my-1 post-image-container">
                            <?= Html::a(Html::img("../../web/$post->img_img", ['class' => 'rounded-1 prof-img-size']), ['post', 'img_id' => $post->img_id], ['class' => 'no-format td-none']) ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload button -->
    <?php if (!Yii::$app->user->isGuest) { ?>
        <p><?= Html::a('<i class="bi bi-pencil-fill" style="font-size: 2rem;"></i>', ['upload'], ['class' => 'fixed-bottom btn btn-lg btn-dark bg-black my-3 mx-3 rounded-4', 'style' => 'width: 5rem;']) ?></p>
    <?php } else {
        echo '';
    }?>
    
</body>
