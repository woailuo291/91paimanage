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
        <li class="li1">房间管理</li>
        <li class="li2">所有房间</li>
        <li class="li2 li3">编辑房间</li>
    </ul>
</div>
<form target="baocms_frm" action="<?php echo U('room/edit',array('room_id'=>$detail['room_id']));?>" method="post">
    <div class="mainScAdd">
        <div class="tableBox">
            <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                <tr>
                    <td class="lfTdBt">房间标题：</td>
                    <td class="rgTdBt"><input type="text" name="data[title]" value="<?php echo (($detail["title"])?($detail["title"]):''); ?>" class="manageInput" />

                    </td>
                </tr><tr>
                <td class="lfTdBt">最小额度：</td>
                <td class="rgTdBt"><input type="text" name="data[conf_min]" value="<?php echo (($detail["conf_min"])?($detail["conf_min"]):''); ?>" class="manageInput" />

                </td>
            </tr><tr>
                <td class="lfTdBt">最大额度：</td>
                <td class="rgTdBt"><input type="text" name="data[conf_max]" value="<?php echo (($detail["conf_max"])?($detail["conf_max"]):''); ?>" class="manageInput" />

                </td>
            </tr>
                <tr>
                    <td class="lfTdBt">是否显示房间：</td>
                    <td class="rgTdBt"><input type="text" name="data[is_show]" value="<?php echo (($detail["is_show"])?($detail["is_show"]):''); ?>" class="manageInput" />

                    </td>
                </tr>
            </table>
        </div>
        <div class="smtQr"><input type="submit" value="确定编辑" class="smtQrIpt" /></div>
    </div>
</form>

     
        
</div>
</body>
</html>