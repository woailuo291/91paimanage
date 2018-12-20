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
        <li class="li1">当前位置>
        <li class="li2"> 文章</li>

    </ul>
</div>
<div class="main-jsgl main-sc">
    <p class="attention"><span>注意：</span> 文章的分类需要选择二级分类才能生效</p>
    <div class="jsglNr">
        <div class="selectNr" style="margin-top: 0px; border-top:none;">
            <div class="left">
                <?php echo BA('article/create','','添加内容');?>
            </div>
            <div class="right">
                <form class="" method="post"  action="<?php echo U('article/index');?>"> 

                    <div class="seleHidden" id="seleHidden">
                        <label >
                            <span>子分类</span>
                            <select id="cate_id" name="cate_id" class="selecttop">
                                <option value="0">请选择...</option>
                                <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): if(($var["cate_id"]) == $parent_id): if(is_array($cates)): foreach($cates as $key=>$var2): if(($var2["parent_id"]) == $var["cate_id"]): ?><option value="<?php echo ($var2["cate_id"]); ?>"  <?php if(($var2["cate_id"]) == $cate_id): ?>selected="selected"<?php endif; ?> ><?php echo ($var2["cate_name"]); ?></option>
                                        <?php if(is_array($cates)): foreach($cates as $key=>$var3): if(($var3["parent_id"]) == $var2["cate_id"]): ?><option value="<?php echo ($var3["cate_id"]); ?>"  <?php if(($var3["cate_id"]) == $cate_id): ?>selected="selected"<?php endif; ?> >&nbsp;&nbsp;-<?php echo ($var3["cate_name"]); ?></option><?php endif; endforeach; endif; endif; endforeach; endif; endif; endif; endforeach; endif; ?>
                            </select>
                        </label>
                        <label>
                        <span>主分类</span>
                        <select name="parent_id" id="parent_id" class="selecttop">
                            <option value="0">请选择...</option>
                            <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): ?><option value="<?php echo ($var["cate_id"]); ?>"  <?php if(($var["cate_id"]) == $parent_id): ?>selected="selected"<?php endif; ?> ><?php echo ($var["cate_name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
                        <script>
                            $(document).ready(function (e) {
                                $("#parent_id").change(function () {
                                    var url = '<?php echo U("articlecate/child",array("parent_id"=>"0000"));?>';
                                    if ($(this).val() > 0) {
                                        var url2 = url.replace('0000', $(this).val());
                                        $.get(url2, function (data) {
                                            $("#cate_id").html(data);
                                        }, 'html');
                                    }
                                });

                            });
                        </script> 
                        </label>
                        <span>关键字</span>
                        <input type="text"  class="inptText" name="keyword" value="<?php echo ($keyword); ?>"  />

                        <input type="submit" value=" 搜索"  class="inptButton" />
                    </div> 
                </form>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <form  target="baocms_frm" method="post">
            <div class="tableBox">
                <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;"  >
                    <tr>
                        <td class="w50"><input type="checkbox" class="checkAll" rel="article_id" /></td>
                        <td class="w50">ID</td>
                        <td>标题</td>
                        <td>分类</td>
                        <td>关键字</td>
                        <td>创建时间</td>
                        <td>浏览量</td>
                        <td>操作</td>
                    <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>
                            <td><input class="child_article_id" type="checkbox" name="article_id[]" value="<?php echo ($var["article_id"]); ?>" /> </td>
                            <td><?php echo ($var["article_id"]); ?></td>
                            <td><?php echo ($var["title"]); ?></td>
                            <td><?php echo ($cates[$var['cate_id']]['cate_name']); ?></td>
                            <td><?php echo ($var["keywords"]); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$var["create_time"])); ?></td>
                            <td><?php echo ($var["views"]); ?></td>
                            <td>
                            <?php if(($var["audit"]) == "0"): echo BA('article/audit',array("article_id"=>$var["article_id"]),'审核','act','remberBtn'); endif; ?>
                                <?php echo BA('article/edit',array("article_id"=>$var["article_id"]),'编辑','','remberBtn');?>
                                <?php echo BA('article/delete',array("article_id"=>$var["article_id"]),'删除','act','remberBtn');?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                </table>
                <?php echo ($page); ?>
            </div>
            <div class="selectNr" style="margin-bottom: 0px; border-bottom: none;">
                <div class="left">
                    <?php echo BA('article/delete','','批量删除','list','a2');?>
                    <?php echo BA('article/audit','','批量审核','list','remberBtn');?>
                </div>
            </div>
        </form>
    </div>
</div>

     
        
</div>
</body>
</html>