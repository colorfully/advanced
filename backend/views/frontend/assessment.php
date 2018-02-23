<div class="container">
    <div style="margin-bottom: 20px">
        <span>请选择职工:</span>
        <select title="选择" id="choose">
            <option value="0"></option>
            <?php
            foreach($StaffList as $key=>$value){
                    echo ' <option value="'.$value['user_id'].'">'.$value['name'].'</option>';
                }
            ?>

        </select>
    </div>
    <div id="table">
        <span>填选下列考核信息:</span>
        <table class="table table-bordered table-dark" style="margin-top: 10px" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">评价因素</th>
                <th scope="col">对评价期间工作成绩的评价要点</th>
                <th scope="col">评价分数(1~10)</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($StandardList as $key=>$value) {?>
                <tr>
                    <th scope="row"><?= $value['id'];?></th>
                    <td><?= $value['title'];?></td>
                    <td><?= $value['content'];?></td>
                    <td>
                        <select class="score">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3">
                    <span>评价:</span>
                    <textarea rows="4" style="width: 100%" id="assess"></textarea>
                </td>
                <td ><span>平均分:</span><input disabled style="width: 50px" id="avg"></td>
            </tr>
            </tbody>
        </table>
        <input name="_csrf-backend" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <button class="btn btn-primary" style="float: right" id="confirm">确定</button>
    </div>



</div>
<script type="text/javascript">
    $(function () {
        //算出平均分
        $('.score').on('change',function () {
            var a=0;
            var num=0;
            $(".score").each(function(){
                a+=parseInt($(this).val());
                num+=1;
            });
            var avg=(a / num).toFixed(2);
            $('#avg').val(avg);
        });
        //当切换名字时，重置其他写入的数据
        $("#choose").on("change",function(){
            $(".score").each(function(){
                $(this).val(1);
            });
            $('#avg').val('');
            $('#assess').val('');
        });
        $('#confirm').on('click',function () {
            var a=0;
            $(".score").each(function(){
                a=a+','+$(this).val();
            });
            $.ajax({
                type:'post',
                url:'http://localhost/advanced/backend/web/index.php?r=frontend/create-assessment',
                dataType:'json',
                data:{
                    'user_id':$('#choose').val(),
                    'score_date':a,
                    'assess':$('#assess').val(),
                    'avg':$('#avg').val(),
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
    })
</script>