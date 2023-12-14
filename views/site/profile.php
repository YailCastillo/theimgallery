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
                    <img class="border border-white border-3 p-1 rounded-circle" style="width: 8rem; height: 8rem; object-fit: cover;" src="
                    <?php if ($profile->prof_img != 'images/user_icon.jpg') { ?>
                        <?= Html::encode("../../web/$profile->prof_img") ?>
                    <?php }else { ?>
                        <?= Html::encode("../../$profile->prof_img") ?>
                    <?php } ?>"/>

                    <div class="position-relative d-flex flex-column text-white" style="width: 20rem;">
                        <div class="">
                            <h6 class="m-0">Posts</h6>
                            <?= Html::tag('div', count($model), ['class' => 'mx-auto']) ?>
                        </div>
                        <div class="fw-bold">
                            <?= Html::encode($user->username) ?>
                        </div>
                        <div class="text-break">
                            <?= Html::encode($profile->prof_bio) ?>
                        </div>

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
                    <div class="row">
                        <?php foreach ($model as $post) { ?>
                        <div class="m-auto col-4 gx-2 my-1" style="max-width: 13rem; max-height: 13rem;">
                            <?= Html::a(Html::img("../../web/$post->img_img", ['class' => 'rounded-1', 'style' => 'width: 100%; height: 100%; object-fit: cover;']), ['post', 'img_id' => $post->img_id], ['class' => 'text-decoration-none text-white td-none']) ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
</body>
