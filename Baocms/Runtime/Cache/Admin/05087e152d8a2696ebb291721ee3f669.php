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
<?php echo ($v); ?>
<div class="mainBt">
    <ul>
        <li class="li1">商家</li>
        <li class="li2">会员提现</li>
        <li class="li2 li3">提现管理</li>
    </ul>
</div>
<div class="main-jsgl main-sc">
    <div class="jsglNr">
        <div class="selectNr" style="margin-top: 0px; border-top:none;">
            <form method="post" action="<?php echo U('usercard/index');?>">

                <div class="left">
                    <div class="seleK">
                        <label>
                            <span>开始时间</span>
                            <input type="text"    name="bg_date" value="<?php echo (($bg_date)?($bg_date):''); ?>"  onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"  class="text" />
                        </label>
                        <label>
                            <span>结束时间</span>
                            <input type="text" name="end_date" value="<?php echo (($end_date)?($end_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"  class="text" />
                        </label>
                        <div class="right">
                            <input type="submit" value="   搜索"  class="inptButton" />
                        </div>

                    </div>

            </form>
            <div class="right">
                <form class="search_form" method="post" action="<?php echo U('usercash/index');?>">
                    <div class="seleHidden" id="seleHidden">

                    </div>
                </form>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <!--*******************-->

        <!--*******************-->
        <form method="post" action="<?php echo U('usercash/index');?>">
            <div class="selectNr selectNr2">
                <div class="left">
                    <div class="seleK">
                        <label>
                            <span>账户</span>
                            <input type="text" name="account" value="<?php echo ($account); ?>" class="inptText" />
                        </label>
                    </div>
                </div>
                <div class="right">
                    <input type="submit" value="   搜索"  class="inptButton" />
                </div>
        </form>
        <div class="clear"></div>
    </div>
    <form target="baocms_frm" method="post">
        <div class="tableBox">
            <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;"  >
                <tr>
                    <td class="w50"><input type="checkbox" class="checkAll" rel="cash_id" /></td>
                    <td class="w50">记录ID</td>
                     <td>打款订单</td>
                    <td>账户信息</td>
                    <td>提现金额</td>
                    <td>提现日期</td>
                    <td>状态</td>
                    <td>查看用户往来</td>
                    <td>打款/通过时间</td>
                </tr>
                <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>
                        <td><input class="child_cash_id" type="checkbox" name="cash_id[]" value="<?php echo ($var["cash_id"]); ?>" <?php if ($var['status'] != 0){echo 'disabled="disabled"';}?> /></td>
                        <td><?php echo ($var["user_id"]); ?></td>
                       <td><?php echo ($var["pass_ord_id"]); ?></td>
                        <td>
                            <p>姓名：<?php echo ($var["user_name"]); ?></p>
                            <p>支付宝：<?php echo ($var["zfb_num"]); ?></p>
                            <p>银行卡号：<?php echo ($var["bank_num"]); ?></p>
                            <p>开户人：<?php echo ($var["bank_userName"]); ?></p>
                            <p>开户行：<?php echo ($var["bank_info"]); ?></p>
                        </td>
                        <td><?php echo ($var['money'] / 100); ?> 元</td>
                        <td><?php echo (date('Y-m-d H:i:s', $var['time'])); ?></td>
                        <td>
                            <?php if($var["status"] == 0): ?>未审
                                <?php elseif($var["status"] == 1): ?>
                                <font color="#0099cc">通过</font>
                                <?php else: ?>
                                <font color="#de5b23">拒绝</font><?php endif; ?>
                        </td>
                        </td>
                        <td><?php echo BA('usercash/usermoneyinfo',array("user_id"=>$var["user_id"]),'查看明细','','remberBtn');?></td>

                        <td><?php echo (date('Y-m-d H:i:s', $var['pass_time'])); ?></td>
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