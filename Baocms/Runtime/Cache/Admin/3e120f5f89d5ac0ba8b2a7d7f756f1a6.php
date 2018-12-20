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
<style>

    body{background:#F1F1F1;}
    .comiis_19ditu_bg{width:100%;margin:0 auto 10px;padding:5px 0 0 5px;overflow: hidden;}
    .comiis_19forum{margin:0 5px 5px 0;float:left;width:210px;height:200px;background:#fff;overflow: hidden;}
    .comiis_19forum .comiis_19forum_div{margin:10px;}
    .comiis_19forum .comiis_19forum_title{height:53px;position:relative;}
    .comiis_19forum .comiis_19forum_icon{width:48px;height:48px;position:absolute;top:0;right:0px;background:url(comiis_ico.gif) no-repeat 0 top;border-radius:5px;}
    .comiis_19forum .comiis_19forum_title h2{height:26px;overflow:hidden;}
    .comiis_19forum .comiis_19forum_title h2 a{color:#666;;font:100 22px/24px "Microsoft Yahei","SimHei";text-decoration:none;}
    .comiis_19forum .comiis_19forum_title em{color:#999;display:block;line-height:24px;height:24px;overflow: hidden;font-style: normal;}
    .comiis_19forum .comiis_19forum_list{height:130px;color:#999;overflow:hidden;}
    .comiis_19forum .comiis_19forum_list a{}
    .comiis_19forum .comiis_19forum_list h3{line-height:22px;width:100%;margin-right:3px;float:left;height:22px;font-size:14px;overflow:hidden;font-weight:400;    color: #666;}
    .comiis_19forum .comiis_19forum_list h3 a{font-size:12px;color: #666;}
    .comiis_19forum_style1{width:377px}
    .comiis_19forum_style1 .comiis_19forum_div{width:166px;height:142px;float:left;display:inline;}
    .comiis_19forum_style1 .comiis_19forum_rightad{width:186px;height:162px;float:right;display:inline;overflow:hidden;}
    .comiis_19forum_style2{height:333px;}
    .comiis_19forum_style2 .comiis_19forum_div{width:166px;height:142px;}
    .comiis_19forum_style2 .comiis_19forum_bottomad{width:186px;height:164px;overflow:hidden;padding-top:5px;}
    .comiis_19forum_style3{width:377px;height:333px;}
    .comiis_19forum_style3 .comiis_19forum_div{width:357px;height:142px;}
    .comiis_19forum_style3 .comiis_19forum_bottomad{width:377px;height:164px;overflow:hidden;padding-top:5px;}
    .comiis_19forum_style3 .comiis_19forum_topad{position:absolute;top:0;right:50px;width:150px;height:48px;overflow:hidden;}
    .comiis_19forum_style3 .comiis_19forum_list h3{width:86px;margin-right:3px;}
    .comiis_19forum_top{border-top:#fff 2px solid;zoom:1;}
    .comiis_hover .comiis_19forum_icon{background-position:0 bottom;}
    .comiis_hover{box-shadow:0 0 6px rgba(50,50,50,0.3);}
    .comiis_19ditu_bg .comiis_19forum .comiis_ad{padding:6px 8px 8px;}
    .comiis_19ditu980 .comiis_19ditu_bg {width:975px;}
    .comiis_19ditu980 .comiis_19forum{width:190px;}
    .comiis_19ditu980 .comiis_19forum .comiis_19forum_list h3{width:82px;}
    .red{ color:#F00 !important}
    .mainBt ul span{ background:#F00; color:#FFF; padding:5px 15px; margin-right:40px;}
</style>
<div class="mainBt">
    <ul>
        <li class="li1">首页</li>
        <li class="li2">后台首页</li>
        <li class="li2 li3">待办事项</li>
        <?php if($warning['is_ip'] == 1): if(!empty($admin['username'])): ?><span style="float:right">尊敬的&nbsp;<?php echo ($admin["username"]); ?>&nbsp;您上次登录IP跟本次登录IP地址不一致，建议您立即修改密码！</span><?php endif; endif; ?>
    </ul>
</div>


<div class="main-jsgl main-sc">
    <div class="comiis_19ditu ">
        <ul class="comiis_19ditu_bg cl masonry" style="position: relative; height: 1014px;">

            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h2><a href="">系统概况</a></h2>
                            <em>欢迎：<?php echo ($admin["username"]); ?>（<?php echo ($admin["role_name"]); ?>）</em>
                        </div>
                        <div class="comiis_19forum_list">
                            <h3><a href="##">1：上次登录地址：<?php echo ($ad["last_ip"]); ?></a></h3>
                            <h3><a href="##">2：更新到<?php echo ($v); ?></a></h3>
                            <h3><a href="##">3：php版本：<?php echo phpversion();?></a></h3>


                        </div>
                    </div>
                </div>
            </li>

            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h2><a href="<?php echo U('user/index');?>">会员数据</a></h2>
                            <em>总：<?php echo ($counts["users"]); ?>个会员</em>
                        </div>
                        <div class="comiis_19forum_list">
                            <h3><a href="<?php echo U('user/index');?>" class="dot">1：今日新增<a class="red"><?php echo ($counts["totay_user"]); ?></a>个会员</a></h3>
                            <h3><a href="<?php echo U('user/index');?>">2：已有<?php echo ($counts["user_moblie"]); ?>人验证手机号</a></h3>
                            <h3><a href="<?php echo U('user/index');?>">3：已有<?php echo ($counts["user_email"]); ?>人绑定邮箱</a></h3>
                            <h3><a href="<?php echo U('user/index');?>">4：qq注册<?php echo ($counts["user_qq"]); ?>人.</a></h3>
                            <h3><a href="<?php echo U('user/index');?>">5：微信登录<?php echo ($counts["user_weixin"]); ?>人.</a></h3>
                            <h3><a href="<?php echo U('user/index');?>">6：当前在线人数<?php echo ($counts["online"]); ?>人.</h3>


                        </div>
                    </div>
                </div>
            </li>


            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">机器人余额</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["robmoney"]); ?></a></h1>
                        </div>
                    </div>
                </div>



            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">免死金额</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["miansi"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>


            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">佣金总额</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["yongjin"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>


            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">客户未提现</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["client"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>



            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">客户中奖</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["zj"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>


            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">体验金</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["tyj"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>



            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">总提现申请</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["txall"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>



            </li>
            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">提现成功</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["txsucc"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>

            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">充值金额</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["zfb"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>
            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">今日充值</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["tdzfb"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>
            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">今日总提现</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["tdtxall"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>
            <li class="comiis_19forum comiis_19forum_style0 masonry-brick">
                <div class="comiis_19forum_top comiis_19forum_id1">
                    <div class="comiis_19forum_div">
                        <div class="comiis_19forum_title">
                            <span class="comiis_19forum_icon"></span>
                            <h1><a href="#" style="font-size: 32px">今提现成功</a></h1>
                        </div>
                        <div class="comiis_19forum_list">

                            <h1><a href="#" style="font-size: 32px; color: red"><?php echo ($counts["tdtxsucc"]); ?></a></h1>
                        </div>
                    </div>
                </div>
            </li>


        </ul>
        <div class="cl"></div>
    </div>
</div>




     
        
</div>
</body>
</html>