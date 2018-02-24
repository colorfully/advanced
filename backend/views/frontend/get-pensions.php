<?php
use yii\widgets\LinkPager;
?>
<div class="container">
    <blockquote class="blockquote">
        <p class="mb-0">历史领取记录</p>
    </blockquote>
    <?php if($need_month==0&&$can_use){?>
    <button type="button" id="get_pension" class="btn btn-primary" style="float: right">领取养老金</button>
    <?php }?>
    <input name="_csrf-backend" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">领取养老金金额</th>
            <th scope="col">领取日期</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($PensionsList as $key=>$value){
            echo '<tr><th scope="row">'.($key+1).'</th>';
            echo '<td>'.$value['get_pension'].'元</td>';
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
            url:'http://localhost/advanced/backend/web/index.php?r=frontend/get-pensions',
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