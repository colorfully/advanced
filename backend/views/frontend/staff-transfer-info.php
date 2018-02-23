<div class="container">
    <ul class="list-group">
        <?php
        if(isset($StaffTransfer_info)){
            foreach($StaffTransfer_info as $key=>$value){
                echo '<div class="panel panel-warning">';
                echo '<div class="panel-heading">原职位:'.$value['original_position'].'&nbsp&nbsp&nbsp新职位:'.$value['now_position'].'</div>';
                echo '<div class="panel-body">'.$value['reason'].'</div>';
                echo '<div class="panel-footer">日期:'.$value['create_time'].'&nbsp&nbsp&nbsp调动者:'.$value['author_name'].'</div>';
                echo '</div>';
            }
        }
        ?>
    </ul>
</div>