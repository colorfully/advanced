<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GetPension */
/* @var $form yii\widgets\ActiveForm */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inside Premium Subscriptions</title>
    <link rel="stylesheet" media="all" href="../../backend/web/assets/frontend/css/premium.css" />
    <meta name="csrf-param" content="authenticity_token" />
    <meta name="csrf-token" content="AkEsbB3v3B3Ag8uDh1j/PVA13fY2uktUTGbrLpK1SVBdQXNWHx0Pe5XThmWo/VER3TBSQSavE9ttEQFidIo4VA==" />
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Become a premium subscriber today. We&#39;ll be your on-demand research team." name="description">

</head>
<body class="body">
<!-- INTRO -->
<div class="hero-section" data-ix="show-nav-bar-on-scroll-50" id="Home">
    <div class="slider w-slider" data-animation="slide" data-duration="500">
        <div class="mask w-slider-mask">
            <div class="slide-1 w-slide">
                <div class="coffe-cup w-hidden-medium w-hidden-small w-hidden-tiny" data-ix="slide-from-right-coffe-on-load"></div>
                <div class="black-eyeglasses w-hidden-medium w-hidden-small w-hidden-tiny" data-ix="slide-from-right-eyeglasses-on-load"></div>
                <div class="pens-holder w-hidden-medium w-hidden-small w-hidden-tiny" data-ix="slide-from-left-pens-holder-on-load"></div>
                <div class="content-wrapper slide-1-hero w-container">
                    <div class="hero-header-text">
                        <h1 class="heading-1 hero">高校 <span class="thin">个人信息系统</span></h1>
                        <p class="hero-subtitle">登录您的账号</p>
                        <!-- LOGIN FORM -->
                        <div id="form-wrapper">
                            <form class="new_premium_subscriber_auth" id="login" action="index.php?r=frontend/index" accept-charset="UTF-8" data-remote="true" method="post">
                                    <input name="_csrf-backend" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                                <label>
                                    <input class="field is-empty" type="text" name="premium_subscriber_auth[email]" id="premium_subscriber_auth_email" />
                                    <span><span>邮箱</span></span>
                                </label>
                                <label>
                                    <input class="field is-empty" type="password" name="premium_subscriber_auth[password]" id="premium_subscriber_auth_password" />
                                    <span><span>密码</span></span>
                                </label>
                                <p>
                                    <?php
                                    if(isset($error)){
                                        echo $error;
                                    }
                                    ?>
                                </p>
                                <input type="submit" name="commit" value="登录" class="button" data-disable-with="Checking..." />
                                <div class="clearfix"></div>
                                <br />
                            </form><script type="text/javascript">
                                var inputs = document.querySelectorAll('input.field');
                                Array.prototype.forEach.call(inputs, function(input) {
                                    input.addEventListener('focus', function() {
                                        input.classList.add('is-focused');
                                        input.parentElement.classList.add('is-focused');
                                    });
                                    input.addEventListener('blur', function() {
                                        input.classList.remove('is-focused');
                                        input.parentElement.classList.remove('is-focused');
                                    });
                                    input.addEventListener('keyup', function() {
                                        if (input.value.length === 0) {
                                            input.classList.add('is-empty');
                                            input.parentElement.classList.remove('has-content');
                                        } else {
                                            input.classList.remove('is-empty');
                                            input.parentElement.classList.add('has-content');
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->

<script src="../../assets/frontend/js/jquery.js" type="text/javascript"></script>


<!-- TOASTR -->
<script type="text/javascript">
    $(document).ready(function() {
    });
</script>
</body>
</html>
