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
<style>.lfTdBt {width: 150px;}</style>
<div class="mainBt">
    <ul>
        <li class="li1">设置</li>
        <li class="li2">基本设置</li>
        <li class="li2 li3">采集设置</li>
    </ul>
</div>

<p class="attention">劲爆新功能 <span> 注意：这个单独卖，如果不填写，采集到黄页库，已就是商家的小店库中，采集之前请先备份数据库，切记~！</span></p>
<form  target="baocms_frm" action="<?php echo U('setting/collects');?>" method="post">
    <div class="mainScAdd">
        <div class="tableBox">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
            
               <tr>
                    <td class="lfTdBt">是否开采集</td>
                    <td class="rgTdBt">
               <label><input type="radio" name="data[open]" <?php if(($CONFIG["collects"]["open"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"  />开启</label>
               <label><input type="radio" name="data[open]"  <?php if(($CONFIG["collects"]["open"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"  />关闭</label>
                        <code>选择开启才会采集，选择不开启不会采集！</code>
                    </td>
                </tr>
            
                <tr>
                    <td class="lfTdBt">小区采集编号：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[community]" value="<?php echo ($CONFIG["collects"]["community"]); ?>" class="scAddTextName w150" />
						<code>就是那个频道采集到小区数据库，默认4</code>
                    </td>
                </tr>
                
                 <tr>
                    <td class="lfTdBt">商家采集编号：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[shop]" value="<?php echo ($CONFIG["collects"]["shop"]); ?>" class="scAddTextName w150" />
						<code><a target="_blank"  style="color:#00F;" href="http://www.abc.com/10552.html">就是那个频道采集到商家数据库，不懂点我！</a></code>
                    </td>
                </tr>
           
            </table>

        </div>

        <div class="smtQr"><input type="submit" value="确认保存" class="smtQrIpt" /></div>

    </div>

</form>


     
        
</div>
</body>
</html>