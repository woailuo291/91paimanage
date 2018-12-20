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
        <li class="li2 li3">提现设置</li>
    </ul>
</div>

<p class="attention">这里可以设置会员提现至少满多少钱才可以提现，或者单笔不超过多少钱！<span>注意：单笔提现设置必须比满多少元大！记住了！不能设置为0，可以留空！</span></p>
<form  target="baocms_frm" action="<?php echo U('setting/cash');?>" method="post">
    <div class="mainScAdd">
        <div class="tableBox">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
            
                <tr>
                    <td class="lfTdBt">网站会员最低提现：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[user]" value="<?php echo ($CONFIG["cash"]["user"]); ?>" class="scAddTextName w150" />
                        
						<code>就是网站的会员一次提现最少多少钱</code>
                        <input type="text" name="data[user_big]" value="<?php echo ($CONFIG["cash"]["user_big"]); ?>" class="scAddTextName w150" />
                        <code>就是网站的会单笔最大提现金额</code>
                    </td>

                </tr>
          
                
                
                <tr>
                    <td class="lfTdBt">商户最低提现：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[shop]" value="<?php echo ($CONFIG["cash"]["shop"]); ?>" class="scAddTextName w150" />
						<code>网站商家一次最低提现多少钱</code>
                        <input type="text" name="data[shop_big]" value="<?php echo ($CONFIG["cash"]["shop_big"]); ?>" class="scAddTextName w150" />
						<code>网站商单笔最大提现多少钱</code>
                        
                    </td>
                </tr>
                
              
                
                
                 <tr> 
                    <td class="lfTdBt">认证商户最低提现：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[renzheng_shop]" value="<?php echo ($CONFIG["cash"]["renzheng_shop"]); ?>" class="scAddTextName w150" />
						<code>通过资质认证的商家每次提现可以多少钱</code>
                        
                        <input type="text" name="data[renzheng_shop_big]" value="<?php echo ($CONFIG["cash"]["renzheng_shop_big"]); ?>" class="scAddTextName w150" />
						<code>认证商户单笔最大提现多少钱</code>
                        
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