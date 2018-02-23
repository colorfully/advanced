<?php
use yii\widgets\LinkPager;
?>
<div class="container">
        <div class="page-header">
            <h1>校园招聘</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  data-whatever="@mdo">创建招聘信息</button>
            <input name="_csrf-backend" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        </div>
        <?php
        if($type==1){
            if(isset($recruitmentList)){
                foreach($recruitmentList as $key=>$value){
                    echo '<div class="panel panel-default">';
                    echo '<div class="panel-heading"><a href="/advanced/backend/web/index.php?r=frontend/view-recruitment&id='.$value['id'].'">'.$value['company'].'</a></div>';
                    echo ' <div class="panel-body">';
                    echo '<p>'.$value['introduced'].'</p>';
                    echo '<p class="text-right">截至日期:'.$value['deadline'].'</p>';
                    echo '<p class="text-right">介绍人:'.$value['introducer'].'</p>';
                    echo '</div>';
                    echo '<table class="table">';
                    echo '<thead><tr>';
                    echo '<th>职位</th>';
                    echo '<th>薪资</th>';
                    echo '</tr></thead>';
                    echo ' <tbody>';
                    foreach ($value['position_list'] as $val){
                        echo '<tr>';
                        echo '<th >'.$val['position_name'].'</th>';
                        echo '<th >'.$val['position_money'].'</th>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo ' </table>';
                    echo '</div>';
                }
            }
            LinkPager::widget([
                'pagination' => $pagination,
            ]);
        }else{
        ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?= $recruitment_info['company']; ?></div>
        <div class="panel-body">
            <div class="form-group">
                <label for="introduced" class="control-label">公司简介:</label>
                <textarea class="form-control" disabled><?= $recruitment_info['introduced']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="address" class="control-label">邮箱:</label>
                <input class="form-control" value="<?= $recruitment_info['email']; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="introduced" class="control-label">电话号码:</label>
                <input class="form-control" value="<?= $recruitment_info['phone']; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="address" class="control-label">地址:</label>
                <input class="form-control" value="<?= $recruitment_info['address']; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="deadline" class="control-label">介绍人:</label>
                <input  class="form-control" value="<?= $recruitment_info['introducer']; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="method" class="control-label">方式:</label>
                <?php if($recruitment_info['method']==2){?>
                <input class="form-control" value="校园摆摊招聘" disabled>
                <?php }?>
                <input class="form-control" value="网络招聘" disabled>
            </div>
            <div class="form-group">
                <label for="school_location" class="control-label">学校位置:</label>
                <input class="form-control" value="<?= $recruitment_info['school_location']; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="content" class="control-label">招聘要求:</label>
                <textarea class="form-control" name="content" rows="4" id="content" disabled><?= $recruitment_info['content']; ?></textarea>
            </div>
            <table class="table">
                <thead><tr>
                    <th>职位</th>
                    <th>薪资</th>
                    </tr></thead>
              <tbody>
                <?php foreach ($recruitment_info['position_list'] as $val){
                echo '<tr class="primary">';
                    echo '<th >'.$val['position_name'].'</th>';
                    echo '<th >'.$val['position_money'].'</th>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">截至日期:<?= $recruitment_info['deadline'];?></div>
    </div>
    <?php }?>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">创建招聘信息</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="company" class="control-label">公司:</label>
                            <input type="text" class="form-control" name="company" id="company">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label">电话号码:</label>
                            <input class="form-control" name="phone" id="phone" type="tel">
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label">地址:</label>
                            <input class="form-control" name="address" id="address" >
                        </div>
                        <div class="form-group">
                            <label for="deadline" class="control-label">截至日期:</label>
                            <input type="date" class="form-control" name="deadline" id="deadline">
                        </div>
                        <div class="form-group">
                            <label for="method" class="control-label">方式:</label>
                            <select class="form-control" name="method" id="method">
                                <option value="1">网络招聘</option>
                                <option value="2">校园摆摊招聘</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="school_location" class="control-label">学校位置:</label>
                            <input class="form-control" name="school_location">
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">邮箱:</label>
                            <input class="form-control" name="email" type="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="introduced" class="control-label">公司简介:</label>
                            <textarea class="form-control" name="introduced" id="introduced"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="position_info" class="control-label">职位:(格式:职位1-3K~6K,职位2-2K~5K)</label>
                            <textarea class="form-control" name="position_info" id="position_info"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label">内容:</label>
                            <textarea class="form-control" name="content" rows="4" id="content"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary" id="confirm">提交</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function () {
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this)
        })
        $('#confirm').on('click',function () {
            $.ajax({
                type:'post',
                url:'http://localhost/advanced/backend/web/index.php?r=frontend/create-recruitment',
                dataType:'json',
                data:{
                    'company':$('#company').val(),
                    'phone':$('#phone').val(),
                    'address':$('#address').val(),
                    'deadline':$('#deadline').val(),
                    'method':$('#method').val(),
                    'school_location':$('#school_location').val(),
                    'email':$('#email').val(),
                    'introduced':$('#introduced').val(),
                    'position_info':$('#position_info').val(),
                    'content':$('#content').val(),
                    '_csrf-backend':$('#_csrf').val()
                },
                success:function(data){
                    alert('成功');
                    $('#exampleModal').on('hidden.bs.modal');
                },
                error:function(jqXHR){
                    //请求失败函数内容
                }
            });
        })

    });
</script>