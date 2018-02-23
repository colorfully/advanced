<?php
use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
    <div class="container">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= (isset($user_info['staffinfo']))?$user_info['staffinfo']['name']:''?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= (isset($user_info))?$user_info['email']:''?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">地址</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= (isset($user_info))?$user_info['staffinfo']['address']:''?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">电话</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= (isset($user_info))?$user_info['staffinfo']['phone']:''?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">年龄</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= (isset($user_info))?$user_info['staffinfo']['age']:''?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">职位</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= (isset($user_info))?$user_info['staffinfo']['position']:''?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">性别</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= (isset($user_info))?$user_info['staffinfo']['sex']:''?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">薪水</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= (isset($user_info))?$user_info['staffinfo']['pay']:''?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">入职时间</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= (isset($user_info))?$user_info['staffinfo']['create_date']:''?></p>
                </div>
            </div>
        </form>
    </div>
<?php $this->endPage() ?>

