<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\UserGallery;
use PHPUnit\Framework\MockObject\Builder\Identity;
use app\models\Image;
use app\models\Profile;
use Symfony\Component\Mime\Encoder\EncoderInterface;

$this->title = 'TheIMGallery';
?>
<body>
    <!-- Container -->
    <div class="d-flex flex-column align-items-center container-fluid">

        <!-- Feed container -->
        <div class="d-flex flex-column align-items-center mt-1 py-4 px-5 container-fluid rounded-4 shadow-lg feed-container-bg" style="height: auto; width: 50rem;">

            <!-- Post container -->
            <?php foreach ($image as $post) { 
                $profile = Profile::findOne(['prof_id' => $post->prof_id]);?>
                <div class="d-flex flex-column my-2 rounded-4 shadow bg-black text-light container-fluid" style="max-width: 25rem; height: auto;">

                    <div class="d-flex justify-content-between align-items-center lh-1 pt-2 fw-bold py-2">
                        <div class="d-flex align-items-center">
                            <!-- Profile pic -->
                            <?= Html::a(Html::img("../../$profile->prof_img", ['class' => 'rounded-circle me-1', 'style' => 'width: 1.6rem; height: 1.6rem; object-fit: cover; padding: .1rem;']), ['profile', 'prof_id' => $post->prof_id]) ?>
                            <!-- Username -->
                            <?= Html::a(Html::encode($post->img_user), ['profile', 'prof_id' => $post->prof_id], ['class' => 'no-format']) ?>
                        </div>
                        
                        <!-- Post dots -->
                        <?php 
                            if (Yii::$app->user->isGuest || $post->prof_id != Yii::$app->user->identity->id) {
                                echo "";
                            } else if ($post->prof_id == Yii::$app->user->identity->id) {?>
                                <div class="dropdown">
                                    <i class="bi bi-three-dots dropdown-toggle" type="button"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu dropdown-menu-dark drop" aria-labelledby="dropdownMenuButton1">
                                        <li class="">
                                            <?= Html::a('Edit <i class="bi bi-pencil-fill ms-2"></i>', ['postedit', 'img_id' => $post->img_id], ['class' => 'dropdown-item d-flex aling-items-center', 'style' => 'color: var(--like);']) ?>
                                        </li>
                                        <li class="">
                                            <?= Html::a('Delete <i class="bi bi-trash-fill ms-1"></i>', ['delete', 'img_id' => $post->img_id], ['class' => 'dropdown-item d-flex aling-items-center', 'style' => 'color: var(--delete);', 'data' => ['confirm' => 'Are you sure you want to delete this post?', 'method' => 'post']]) ?>
                                        </li>
                                    </ul>
                                </div>
                        <?php } ?>
                    </div>

                    <!-- IMG -->
                    <div class="px-0 d-flex justify-content-center" style="width: auto; height: auto;">
                        <img class="rounded-1" style="width: 100%; height: 100%; object-fit: cover;" src= "../../web/<?= Html::encode($post->img_img) ?>" alt=""/>
                    </div>

                    <!-- Title -->
                    <div class="fw-bold pt-2">
                        <?= Html::encode($post->img_title) ?>
                    </div>

                    <!-- Caption -->
                    <div class="py-0 text-break" style="height: auto;">
                        <?= Html::tag('p', Html::encode($post->img_capt)) ?>
                    </div>

                    <!-- Date -->
                    <div class="d-flex justify-content-between lh-1 pt-2" style="border-top: solid #464646 1px;">
                        <?= Html::tag('p', Html::encode($post->img_date), ['class' => 'text-secondary', 'style' => 'font-size: 75%;']) ?>
                        <div class="pb-3 text-secondary">
                            <!-- Like Button -->
                            <?= Html::a('0 <i class="bi bi-hand-thumbs-up"></i>', ['postedit', 'img_id' => $post->img_id], ['class' => 'me-4 like-btn user-select-none']) ?>
                            <!-- Comment Button -->
                            <?= Html::a('0 <i class="bi bi-chat"></i>', ['postedit', 'img_id' => $post->img_id], ['class' => 'comment-btn user-select-none']) ?>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>

    <!-- Upload button -->
    <?php if (!Yii::$app->user->isGuest) { ?>
        <p><?= Html::a('<i class="bi bi-pencil-fill" style="font-size: 2rem;"></i>', ['upload'], ['class' => 'fixed-bottom btn btn-lg btn-dark bg-black my-3 mx-3 rounded-4', 'style' => 'width: 5rem;']) ?></p>
    <?php } else {
        echo '';
    }?>

</body>

