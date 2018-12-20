<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo ($CONFIG["site"]["title"]); ?>管理后台</title>
        <meta name="description" content="<?php echo ($CONFIG["site"]["title"]); ?>管理后台" />
        <meta name="keywords" content="<?php echo ($CONFIG["site"]["title"]); ?>管理后台" />
        <!-- <link href="__TMPL__statics/css/index.css" rel="stylesheet" type="text/css" /> -->
        <link href="__TMPL__statics/css/style.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/land.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/pub.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/main.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/js/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script> var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__'; </script>
        <script src="__PUBLIC__/js/jquery.js"></script>
        <script src="__PUBLIC__/js/jquery-ui.min.js"></script>
        <script src="__PUBLIC__/js/my97/WdatePicker.js"></script>
        <script src="/Public/js/layer/layer.js"></script>
        <script src="__PUBLIC__/js/admin.js?v=20150409"></script>
    </head>
    
    
    </head>


<!--[if lte IE 9]>
<div id="ie9-warning">您正在使用 Internet Explorer 9以下的版本，请用谷歌浏览器访问后台、部分浏览器可以开启极速模式访问！不懂点击这里！ <a href="http://www.abc.com/10478.html" target="_blank">查看为什么？</a>
</div>
<script type="text/javascript">
function position_fixed(el, eltop, elleft){  
       // check if this is IE6  
       if(!window.XMLHttpRequest)  
              window.onscroll = function(){  
                     el.style.top = (document.documentElement.scrollTop + eltop)+"px";  
                     el.style.left = (document.documentElement.scrollLeft + elleft)+"px";  
       }  
       else el.style.position = "fixed";  
}
       position_fixed(document.getElementById("ie9-warning"),0, 0);
</script>
<![endif]-->


    <body>
         <iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>
   <div class="main">
<div class="mainBt">
    <ul>
        <li class="li1">会员</li>
        <li class="li2">会员明细</li>
        <li class="li2 li3">我的下家</li>
    </ul>
</div>
<?php echo ($pid); ?>
<div class="main-jsgl main-sc">
    <div class="jsglNr">
        <div class="selectNr" style="margin-top: 0px; border-top:none;">

            <div class="clear"></div>
            <div class="right">

            </div>
        </div>
        <form target="baocms_frm" method="post">
            <div class="tableBox">
                <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;"  >
                    <tr>
                        <td class="w50"><input type="checkbox" class="checkAll" rel="cash_id" /></td>
                        <td class="w50">会员ID</td>
                        <td>下级ID</td>
                        <td>下级昵称</td>
                        <td>下级手机号</td>
                        <td>下级姓名</td>
                    </tr>
                    <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>
                            <td><input class="child_cash_id" type="checkbox" name="cash_id[]" value="<?php echo ($var["cash_id"]); ?>" <?php if ($var['status'] != 0){echo 'disabled="disabled"';}?> /></td>
                            <td><?php echo ($user_id); ?></td>
                            <td><?php echo ($var["user_id"]); ?></td>
                            <td><?php echo ($var["nickname"]); ?></td>
                            <td><?php echo ($var["mobile"]); ?></td>
                            <td><?php echo ($var["name"]); ?></td>

                        </tr><?php endforeach; endif; ?>
                </table>
                <?php echo ($page); ?>
            </div>
            <script src="__PUBLIC__/js/layer/layer.js?v=20150718"></script>
            <script>
                $(document).ready(function () {
                    layer.config({
                        extend: 'extend/layer.ext.js'
                    });
                    $(".jujue").click(function () {
                        var cash_id = $(this).attr('rel');
                        var url = "<?php echo U('usercash/jujue');?>";



                        layer.prompt({formType: 2, value: '', title: '请输入退款理由，并确认'}, function (value) {
                            //alert(value); //得到value
                            if (value != "" && value != null) {
                                $.post(url, {cash_id: cash_id, status: 2,value:value}, function (data) {
                                    if(data.status == 'success'){
                                        layer.msg(data.msg, {icon: 1});
                                        setTimeout(function(){
                                            window.location.reload(true);
                                        },1000)
                                    }else{
                                        layer.msg(data.msg, {icon: 2});
                                    }
                                }, 'json')
                            } else {
                                layer.msg('请填写拒绝理由', {icon: 2});
                            }
                        });
                    })
                })
            </script>

        </form>
    </div>
</div>

     
        
</div>
</body>
</html>