<?php 
header("Content-type: text/html; charset=utf-8");
//获取 省 名称
$result = file_get_contents('http://localhost/webapp/yty_front/php/test_provinces.php');
$result = json_decode($result);
$cnt = count($result);
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1"/>
<!-- uc强制竖屏 -->
<meta name="screen-orientation" content="portrait"/>
<!-- QQ强制竖屏 -->
<meta name="x5-orientation" content="portrait"/>
<!-- UC强制全屏 -->
<meta name="full-screen" content="yes"/>
<!-- QQ强制全屏 -->
<meta name="x5-fullscreen" content="true"/>
<!-- UC应用模式 -->
<meta name="browsermode" content="application"/>
<!-- QQ应用模式 -->
<meta name="x5-page-mode" content="app"/>
<!-- windows phone 点击无高光 -->
<meta name="msapplication-tap-highlight" content="no"/>
<meta charset="utf-8" />
<script type="text/javascript" src="./js/jquery-1.8.3.min.js"></script>
<head>
    <title>省市区三级联动</title>
</head>
<body>
<!-- 初始显示 -->
<!-- 省级 -->
<select name="province" onchange="getCitys(this.value)">
<option value="-1">请选择省份</option>
<?php  for ($i=0; $i < $cnt; $i++) { ?>
<option value="<?php echo $result[$i]->id;?>"><?php echo $result[$i]->name;?></option>
<?php } ?>
</select>
<!-- 市级 -->
<select class="list_city" name="city" onchange="getCountrys(this.value)">
<option value="-1">请选择城市</option>
</select>
<!-- 区级 -->
<select class="list_countrys" name="country" onchange="getPosition(this.value)">
<option value="-1">请选择区县</option>
</select>
<script type="text/javascript">
// 获取省管辖的 市 名称
function getCitys(e){
    // $.post('http://localhost/webapp/yty_front/php/test_citys.php',
    $.post('./php/test_citys.php', // 必须是同一域名下绝对或相对路径
        {'province_id' : e},
        function(data){
            data = eval('('+data+')');
            var len = data.length;
            var html = '<option value="-1">请选择城市</option>';
            for (var i = 0; i < len; i++) {
                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>'
            }
            $('.list_city').html(html);
        });
    // 省级变动同时触发 县级 联动触发
    $(".list_countrys").html('<option value="-1">请选择区县</option>');
}
// 获取市管辖的 县 名称
function getCountrys(e){
    $.post('./php/test_countrys.php',
        {
            'city_id' : e,
        },
        function(data){
            data = eval('('+data+')');
            $(".list_countrys").empty();
            var html = '<option value="-1">请选择区县</option>';
            var len = data.length;
            for (var i = 0; i < len; i++) {
                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>'
            }
            $('.list_countrys').html(html);
        })
}
// 获取所在地代码
function getPosition(e){
    alert(e);
}
</script>
</body>
</html>
