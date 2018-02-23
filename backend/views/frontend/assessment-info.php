<?php
use yii\widgets\LinkPager;
?>
<div class="container">
<div id="table">
    <span>考核各项标准结果信息:</span>
    <table class="table table-bordered table-dark" style="margin-top: 10px" >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">评价因素</th>
            <th scope="col">对评价期间工作成绩的评价要点</th>
            <th scope="col">平均分</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($standard_list as $key=>$value) {?>
            <tr>
                <th scope="row"><?= $value['id'];?></th>
                <td><?= $value['title'];?></td>
                <td><?= $value['content'];?></td>
                <td><?= $value['avg_score'];?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
    <span style="margin-bottom: 20px">所获得的评价如下:</span>
    <?php if(isset($assessment)){ ?>
    <?php foreach($assessment as $value){?>
    <p><?= $value['evaluation'];?></p>
    <span style="float: right">该评价者所给的综合评分:<?=$value['average_score']?></span>
    <?php }?>
    <?php }?>
    <?=
    LinkPager::widget([
        'pagination' => $pagination,
    ]);
    ?>
</div>