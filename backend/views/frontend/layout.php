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
    <meta name="csrf-param" content="authenticity_token" />
    <meta name="csrf-token" content="kt/lVIwTrBKnQtn0SDbeUzSBt3Cekuzk0kM4ga0TpfjN37pujuF/dPISlBJnk3B/uYQ4x46HtGvzNNLNSyzU/A==" />
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
            <a class="inside-logo" href="/">[ INSIDE ]</a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="inside-navbar">
            <form class="search-form searchbar " id="hiddenSearchBox" action="/search/global" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
                <div class="input-group">
                    <input type="search" name="q" id="q" class="form-control" placeholder="Search" />
                </div>
                <div class="input-group-btn">
                    <button name="button" type="submit" class="btn btn-default" data-toggle="searchbar" data-target="#hiddenSearchBox"><i class="fa fa-search fa-2x"></i><span class="sr-only">Search</span></button>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($user_info))
                    echo "<li><a class=\"login-link\">".$user_info['username']."</a></li>"
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
        <div class="col-xs-12" id="tags-wrapper">
            <a class="" id="all-tags-link" href="/">All</a>
            <div id="tags-list">
                <div class="tags-fade-left"></div>
                <ul id="tags-links">
                    <li><a class="active" id="tag-link-technology" href="/tags/technology">Technology</a></li>
                    <li><a class="" id="tag-link-proposed" href="/tags/proposed">Proposed</a></li>
                    <li><a class="" id="tag-link-politics" href="/tags/politics">Politics</a></li>
                    <li><a class="" id="tag-link-business" href="/tags/business">Business</a></li>
                    <li><a class="" id="tag-link-cities" href="/tags/cities">Cities</a></li>
                    <li><a class="" id="tag-link-entertainment" href="/tags/entertainment">Entertainment</a></li>
                    <li><a class="" id="tag-link-sports" href="/tags/sports">Sports</a></li>
                    <li><a class="" id="tag-link-lifestyle" href="/tags/lifestyle">Lifestyle</a></li>
                    <li><a href="javascript:;"></a></li>
                </ul>
                <div class="tags-fade-right"></div>
            </div>
            <div id="tags-arrows">
                <a id="arrow-left" class="disabled" href="#"><i class="fa fa-chevron-left"></i></a>
                <a id="arrow-right" href="#"><i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="modals-placeholder"></div>
<blockquote class="container m-t-xl" role="alert">
    <div class="col-xs-12">
        <div class="col-xs-12 infoquotes text-center">
            <h2>Here's what our subscribers say</h2>
            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 quote">
                <span class="ico_quote">“</span>
                <p class="txt_quote"><i>“diverse, well-selected standout stories”</i></p>
                <p class="author"><b>Tim Annett, WSJ Editor</b></p>
            </aside>
            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 quote">
                <span class="ico_quote">“</span>
                <p class="txt_quote"><i>I get a lot of &#39;news&#39; emails, but the Daily Brief is the only one I find time to read no matter how busy things are.</i></p>
                <p class="author"><b>Pete White</b></p>
            </aside>
            <aside class="col-lg-4 col-md-4 col-sm-12 col-xs-12 quote">
                <span class="ico_quote">“</span>
                <p class="txt_quote"><i>The Inside team does a consistently fantastic job delivering the right news at the right time, in an immediately relatable way. </i></p>
                <p class="author"><b>Daniel James Scott</b></p>
            </aside>
        </div>
    </div>
</blockquote>
<footer class="container-fluid" id="site_footer">
    <ul class="col-lg-6 col-md-6 col-sm-6 col-xs-7 nav nav-pills pull-left text-left footerleft">
        <li><a href="/recent-issues">RECENT ISSUES</a></li>
        <li><a href="/about">ABOUT</a>
    </ul>
    <ul class="col-lg-6 col-md-6 col-sm-6 col-xs-5 nav nav-pills pull-right text-right footerright">
        <li><a target="_blank" href="https://facebook.com/inside"><i class="fa fa-facebook-f"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/inside"><i class="fa fa-twitter"></i></a></li>
    </ul>
</footer>
<script src="/assets/web-b3f93b9d8099a4651ce58e5420c2985e8117476e50ceeec5efb72019c1aca088.js"></script>
<script src="https://cdn.optimizely.com/js/7134920269.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(window).scroll(function() {
            var hT = $('#proposed-lists-trigger').offset().top,
                hH = $('#proposed-lists-trigger').outerHeight(),
                wH = $(window).height(),
                wS = $(this).scrollTop();
            if ((wS > (hT+hH-wH)) && ($('#proposed-list-container').data("reload") == true)) {
                $('#proposed-list-loader').show();
                $('#proposed-list-container').data("reload", false);
                $.get('/tags/technology/load-more-proposed-lists', { page: $('#proposed-list-container').data("page") });
            }

        });
        // scroll tags to current one - if hidden
        $("#tags-links").animate({ scrollLeft: $("#tag-link-technology").position().left - 8 });
    });
</script>
<!-- This site is converting visitors into subscribers and customers with OptinMonster - http://optinmonster.com -->
<script>var om56fc241de837b,om56fc241de837b_poll=function(){var r=0;return function(n,l){clearInterval(r),r=setInterval(n,l)}}();!function(e,t,n){if(e.getElementById(n)){om56fc241de837b_poll(function(){if(window['om_loaded']){if(!om56fc241de837b){om56fc241de837b=new OptinMonsterApp();return om56fc241de837b.init({"s":"17299.56fc241de837b","staging":0,"dev":0,"beta":0});}}},25);return;}var d=false,o=e.createElement(t);o.id=n,o.src="//a.optnmnstr.com/app/js/api.min.js",o.onload=o.onreadystatechange=function(){if(!d){if(!this.readyState||this.readyState==="loaded"||this.readyState==="complete"){try{d=om_loaded=true;om56fc241de837b=new OptinMonsterApp();om56fc241de837b.init({"s":"17299.56fc241de837b","staging":0,"dev":0,"beta":0});o.onload=o.onreadystatechange=null;}catch(t){}}}};(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(o)}(document,"script","omapi-script");
</script>
<!-- / OptinMonster -->
</body>
</html>
