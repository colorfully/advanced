<?php
    use yii\widgets\LinkPager;
?>
<div class="container">
    <blockquote class="blockquote">
        <?php
            $session=Yii::$app->session;
        ?>
        <p class="mb-0"><?= $session->get('username'); ?>已上缴了<mark><?= isset($RecordList['all_pensions'])?$RecordList['all_pensions']:0 ?></mark>个月, 距离缴满还差<mark><?= $RecordList['need_month']?></mark>个月.</p>
    </blockquote>
    <h3>历史上缴记录</h3>
    <?php if($can_use){?>
    <button type="button" id="get_pension" class="btn btn-primary" style="float: right">上缴养老金</button>
    <?php } ?>
    <input name="_csrf-backend" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">薪水</th>
        <th scope="col">上缴养老金</th>
        <th scope="col">上缴日期</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($PensionsList as $key=>$value){
            echo '<tr><th scope="row">'.($key+1).'</th>';
            echo '<td>'.$value['salary'].'元</td>';
            echo '<td>'.$value['refer_pension'].'元</td>';
            echo '<td>'.$value['create_time'].'</td>';
            echo '</tr>';
        }
    ?>
    </tbody>
</table>
    <?=
    LinkPager::widget([
        'pagination' => $pagination,
    ]);
    ?>
</div>
<script type="text/javascript">
    $('#get_pension').on('click',function () {
        $.ajax({
            type:'post',
            url:'http://localhost/advanced/backend/web/index.php?r=frontend/record-pensions',
            dataType:'json',
            data:{
                '_csrf-backend':$('#_csrf').val()
            },
            success:function(data){
                alert('成功');
                location.reload();
            },
            error:function(jqXHR){
                //请求失败函数内容
            }
        });
    })
</script>