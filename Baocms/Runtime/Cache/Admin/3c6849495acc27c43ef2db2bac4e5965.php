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
<style>.lfTdBt {width: 200px;}</style>
<div class="mainBt">

    <ul>

        <li class="li1">设置</li>

        <li class="li2">模板设置</li>

        <li class="li2">手机/PC模板配置</li>

    </ul>

</div>

<div class="main-jsgl main-sc">

    <p class="attention"><span>注意：</span>以后手机上面需要配置的，都尽量在这里写！ 手机中调用方式：$CONFIG['mobile']['yaoyiyao'] </p>

    <form  target="baocms_frm" action="<?php echo U('setting/mobile');?>" method="post">

        <div class="tableBox">

            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
            
                
                
                
            
                 <tr>
                    <td class="lfTdBt">手机版妹子UI是否开启cnd：</td>
                    <td class="rgTdBt">
                        <label><input type="radio" name="data[amazeui]" <?php if(($CONFIG["mobile"]["amazeui"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"  />开启</label>
                        <label><input type="radio" name="data[amazeui]"  <?php if(($CONFIG["mobile"]["amazeui"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"  />不开启</label>
                        <code>开启之后加载又拍云上的css,js,不开启加载本地！针对新模板有效！</code>
                    </td>
                </tr>
                
                
                 <tr>
                    <td class="lfTdBt">物流抢单单价：</td>
                    <td class="rgTdBt">
                       <input type="text" name="data[delivery_price]" value="<?php echo ($CONFIG["mobile"]["delivery_price"]); ?>" class="manageInput  w80" />
                        <code>其实没卵用，简单算一下配送员赚了多少钱</code>
                    </td>
                </tr>
                
                 <tr>
                    <td class="lfTdBt">商家点评后多少天显示：</td>
                    <td class="rgTdBt">
                       <input type="text" name="data[data_shop_dianping]" value="<?php echo ($CONFIG["mobile"]["data_shop_dianping"]); ?>" class="manageInput  w80" />
                        <code>用户点评商家后是立即生效还是多少天后显示？其实没卵用，就是怕用户乱评价，一般建议3-7天。</code>
                    </td>
                </tr>
                
                <tr>
                    <td class="lfTdBt">抢购点评后多少天显示：</td>
                    <td class="rgTdBt">
                       <input type="text" name="data[data_tuan_dianping]" value="<?php echo ($CONFIG["mobile"]["data_tuan_dianping"]); ?>" class="manageInput  w80" />
                        <code>用户点评抢购后是立即生效还是多少天后显示？其实没卵用，就是怕用户乱评价，一般建议3-7天。</code>
                    </td>
                </tr>
                
                <tr>
                    <td class="lfTdBt">外卖点评后多少天显示：</td>
                    <td class="rgTdBt">
                       <input type="text" name="data[data_waimai_dianping]" value="<?php echo ($CONFIG["mobile"]["data_waimai_dianping"]); ?>" class="manageInput  w80" />
                        <code>用户点评外卖后是立即生效还是多少天后显示？其实没卵用，就是怕用户乱评价，一般建议3天。</code>
                    </td>
                </tr>
                
                <tr>
                    <td class="lfTdBt">订座点评后多少天显示：</td>
                    <td class="rgTdBt">
                       <input type="text" name="data[data_ding_dianping]" value="<?php echo ($CONFIG["mobile"]["data_ding_dianping"]); ?>" class="manageInput  w80" />
                        <code>用户点评订座后是立即生效还是多少天后显示？其实没卵用，就是怕用户乱评价，一般建议7-15天。</code>
                    </td>
                </tr>
                
                <tr>
                    <td class="lfTdBt">商城点评后多少天显示：</td>
                    <td class="rgTdBt">
                       <input type="text" name="data[data_mall_dianping]" value="<?php echo ($CONFIG["mobile"]["data_mall_dianping"]); ?>" class="manageInput  w80" />
                        <code>用户点评商城后是立即生效还是多少天后显示？其实没卵用，就是怕用户乱评价，一般建议3-7天。</code>
                    </td>
                </tr>
                
                 <tr>
                    <td class="lfTdBt">家政点评后多少天显示：</td>
                    <td class="rgTdBt">
                       <input type="text" name="data[data_lifeservice_dianping]" value="<?php echo ($CONFIG["mobile"]["data_lifeservice_dianping"]); ?>" class="manageInput  w80" />
                        <code>用户点评家政后是立即生效还是多少天后显示？其实没卵用，就是怕用户乱评价，一般建议7-15天。</code>
                    </td>
                </tr>
                

                <tr>

                    <td class="lfTdBt">刮刮乐ID：</td>

                    <td class="rgTdBt">

                        <input type="text" name="data[guaguale]" value="<?php echo ($CONFIG["mobile"]["guaguale"]); ?>" class="manageInput  w80" />



                    </td>

                </tr>

                <tr>

                    <td class="lfTdBt">抽奖ID：</td>

                    <td class="rgTdBt">

                        <input type="text" name="data[choujiang]" value="<?php echo ($CONFIG["mobile"]["choujiang"]); ?>" class="manageInput  w80" />



                    </td>

                </tr>

                <tr>

                    <td class="lfTdBt">摇一摇ID：</td>

                    <td class="rgTdBt">

                        <input type="text" name="data[yaoyiyao]" value="<?php echo ($CONFIG["mobile"]["yaoyiyao"]); ?>" class="manageInput  w80" />

                    </td>

                </tr>

            </table>

        </div>

        <div class="smtQr"><input type="submit" value="确认保存" class="smtQrIpt" /></div>

    </form>

</div>


     
        
</div>
</body>
</html>