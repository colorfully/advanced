<?php
    use yii\widgets\LinkPager;
?>
<div class="container">
    <?php
        foreach ($punishmentList as $value){
            if($value['type'])
                $color='green';
            else
                $color='red';
            echo ' <h3 class="text" style="color: '.$color.'">'.$value['title'].'</h3>';
            echo '<p class="">&nbsp&nbsp&nbsp&nbsp'.$value['content'].'</p>';
            echo ' <p class="text-right">创建者:'.$value['author_name'].'&nbsp&nbsp&nbsp&nbsp创建时间:'.$value['create_time'].'</p>';
        }
    ?>
    <?=
    LinkPager::widget([
        'pagination' => $pagination,
    ]);
    ?>
</div>