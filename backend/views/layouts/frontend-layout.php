<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>高校管理系统</title>
    <link rel="stylesheet" media="all" href="../../backend/web/assets/frontend/css/site.css" />
    <script src="../../backend/web/assets/frontend/js/jquery.js"></script>
</head>
<body >
<nav class="fullbg headertop navbar navbar-default ">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header logotop">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#inside-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="inside-logo" href="/advanced/backend/web/index.php?r=frontend/site">高校管理系统</a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="inside-navbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                $session=Yii::$app->session;
                echo "<li><a class=\"login-link\">".$session->get('username')."</a></li>";
                echo "<li><a class=\"login-link\" href='/advanced/backend/web/index.php?r=frontend/logout'>退出</a></li>"
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
        <div class="col-xs-12" id="tags-wrapper">
            <div id="tags-list">
                <div class="tags-fade-left"></div>
                <ul id="tags-links">
                    <li><a class="" id="site" href="/advanced/backend/web/index.php?r=frontend/site">首页</a></li>

                    <li><a class="" id="personal-info" href="/advanced/backend/web/index.php?r=frontend/personal-info">个人信息</a></li>
                    <li><a class="" id="punishment" href="/advanced/backend/web/index.php?r=frontend/punishment">奖惩信息</a></li>
                    <li><a class="" id="staff-transfer" href="/advanced/backend/web/index.php?r=frontend/staff-transfer">历史调动信息</a></li>
                    <li><a class="" id="recruitment" href="/advanced/backend/web/index.php?r=frontend/recruitment">校园招聘信息</a></li>
                    <li><a class="" id="record-pensions" href="/advanced/backend/web/index.php?r=frontend/record-pensions">养老金信息</a></li>
                    <li><a class="" id="get-pensions" href="/advanced/backend/web/index.php?r=frontend/get-pensions">领取养老金</a></li>
                    <li><a class="" id="assessment-info" href="/advanced/backend/web/index.php?r=frontend/assessment-info">考核信息</a></li>
                    <li><a class="" id="assessment" href="/advanced/backend/web/index.php?r=frontend/assessment">考核</a></li>
                    <li><a href="javascript:;"></a></li>
                </ul>
                <div class="tags-fade-right"></div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="modals-placeholder"></div>
<div style="height: 667px">


<?= $content ?>
</div>
<footer class="container-fluid" id="site_footer" style="height: 10px">
    <ul class="col-lg-6 col-md-6 col-sm-6 col-xs-7 nav nav-pills pull-left text-left footerleft">
        <li><a href="/advanced/backend/web/index.php?r=frontend/site">高校管理系统</a></li>
        <li><a href="/about"></a>
    </ul>
</footer>
<script src="../../backend/web/assets/frontend/js/permium.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var url=window.location.search;
        var site=url.slice(12);
        if(site =='site'){
            $('#site').addClass('active');
        }
        if(site=='personal-info')
        {
            $('#personal-info').addClass('active');
        }
        if(site=='punishment')
        {
            $('#punishment').addClass('active');
        }
        if(site=='staff-transfer')
        {
            $('#staff-transfer').addClass('active');
        }
        if(site=='recruitment')
        {
            $('#recruitment').addClass('active');
        }
        if(site=='record-pensions')
        {
            $('#record-pensions').addClass('active');
        }
        if(site=='get-pensions')
        {
            $('#get-pensions').addClass('active');
        }
        if(site=='assessment-info')
        {
            $('#assessment-info').addClass('active');
        }
        if(site=='assessment')
        {
            $('#assessment').addClass('active');
        }
    });
</script>
</body>
</html>
