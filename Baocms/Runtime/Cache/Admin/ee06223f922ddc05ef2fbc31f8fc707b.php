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
<style>.lfTdBt {width: 250px;}</style>
<div class="mainBt">

    <ul>

        <li class="li1">设置</li>

        <li class="li2">基本设置</li>

        <li class="li2 li3">其他设置</li>

    </ul>

</div>

<p class="attention"><span>注意：</span>其他设置在这里</p>

<form  target="baocms_frm" action="<?php echo U('setting/other');?>" method="post">

    <div class="mainScAdd">

        <div class="tableBox">

            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >


				
                
                <tr>
                    <td class="lfTdBt">PC模板主色调：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[color]" value="<?php echo ($CONFIG["other"]["color"]); ?>" class="scAddTextName w150" />
						<code>请填写比如：#ccc 之类的颜色代码</code>
                    </td>

                </tr>
                
                
                <tr>

                    <td class="lfTdBt">美洽帐号UID：</td>

                    <td class="rgTdBt">

                        <input type="text" name="data[mechat]" value="<?php echo ($CONFIG["other"]["mechat"]); ?>" class="scAddTextName w150" />
						<code>使用本模块需注册美洽账号并获取帐号ID信息!http://meiqia.com/，针对新模板的，niu模板无效</code>
                    </td>

                </tr>
                
                <tr>
                    <td class="lfTdBt">是否开启手机版美洽客服：</td>
                    <td class="rgTdBt">
                        <label><input type="radio" name="data[mechataudit]" <?php if(($CONFIG["other"]["mechataudit"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"  />开启</label>
                        <label><input type="radio" name="data[mechataudit]"  <?php if(($CONFIG["other"]["mechataudit"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"  />不开启</label>
                        <code>开启之后手机版就显示在线客服，针对新模板的，niu模板无效</code>
                    </td>
                </tr>
                
                <tr>
                    <td class="lfTdBt">手机访问PC页面自动跳转到手机版：</td>
                    <td class="rgTdBt">
                        <label><input type="radio" name="data[url_jump]" <?php if(($CONFIG["other"]["url_jump"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"  />开启</label>
                        <label><input type="radio" name="data[url_jump]"  <?php if(($CONFIG["other"]["url_jump"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"  />不开启</label>
                        <code>开启之后手机访问PC页面自动跳转到手机版！</code>
                    </td>
                </tr>
                
                 <tr>
                    <td class="lfTdBt">是否开启手机底部炫酷导航：</td>
                    <td class="rgTdBt">
                        <label><input type="radio" name="data[footeraudit]" <?php if(($CONFIG["other"]["footeraudit"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"  />开启</label>
                        <label><input type="radio" name="data[footeraudit]"  <?php if(($CONFIG["other"]["footeraudit"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"  />不开启</label>
                        <code>开启之后手机版就显点击弹出那个导航菜单，针对新模板的，niu模板无效</code>
                    </td>
                </tr>
                
                 <tr>
                    <td class="lfTdBt">是否开启手机底部导航：</td>
                    <td class="rgTdBt">
                        <label><input type="radio" name="data[footer]" <?php if(($CONFIG["other"]["footer"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"  />开启</label>
                        <label><input type="radio" name="data[footer]"  <?php if(($CONFIG["other"]["footer"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"  />不开启</label>
                        <code>这个是针对niucms的底部导航模板的</code>
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