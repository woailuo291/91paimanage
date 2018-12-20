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
        <li class="li1">当前位置</li>
        <li class="li2">文章</li>
        <li class="li2 li3">编辑</li>
    </ul>
</div>
        <form target="baocms_frm" action="<?php echo U('article/edit',array('article_id'=>$detail['article_id']));?>" method="post">
           <div class="mainScAdd">
        <div class="tableBox"> 
            <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
            
            <tr>
                    <td class="lfTdBt">所在区域：</td>
                    <td class="rgTdBt">
                        
                        <select name="data[city_id]" id="city_id" style="float: left;" class="seleFl w210"></select>
                       <select name="data[area_id]" id="area_id" style="float: left;"  class="seleFl w210"></select>

                    </td>
                </tr>
                 <script src="<?php echo U('app/datas/cityarea');?>"></script>
                <script>
                    var city_id = <?php echo (int)$detail['city_id'];?>;
                    var area_id = <?php echo (int)$detail['area_id'];?>;
                    function changeCity(cid){
                        var area_str = '<option value="0">请选择.....</option>';
                        for(a in cityareas.area){
                           if(cityareas.area[a].city_id ==cid){
                                if(area_id == cityareas.area[a].area_id){
                                    area_str += '<option selected="selected" value="'+cityareas.area[a].area_id+'">'+cityareas.area[a].area_name+'</option>';
                                }else{
                                     area_str += '<option value="'+cityareas.area[a].area_id+'">'+cityareas.area[a].area_name+'</option>';
                                }  
                            }
                        }
                        $("#area_id").html(area_str);
                    }
                    $(document).ready(function(){
                        var city_str = '<option value="0">请选择.....</option>';
                        for(a in cityareas.city){
                           if(city_id == cityareas.city[a].city_id){
                               city_str += '<option selected="selected" value="'+cityareas.city[a].city_id+'">'+cityareas.city[a].name+'</option>';
                           }else{
                                city_str += '<option value="'+cityareas.city[a].city_id+'">'+cityareas.city[a].name+'</option>';
                           }  
                        }
                        $("#city_id").html(city_str);
                        if(city_id){
                            changeCity(city_id);
                        }
                        $("#city_id").change(function(){
                            city_id = $(this).val();
                            changeCity($(this).val());
                        });
                        
                        $("#area_id").change(function () {
                            var url = '<?php echo U("business/child",array("area_id"=>"0000"));?>';
                            if ($(this).val() > 0) {
                                var url2 = url.replace('0000', $(this).val());
                                $.get(url2, function (data) {
                                    $("#business_id").html(data);
                                }, 'html');
                            }

                        });
                    });
                </script>
            <tr>
                    <td class="lfTdBt">文章所属商家：</td>
                    <td class="rgTdBt">
                        <div class="lt">
                            <input type="hidden" id="shop_id" name="data[shop_id]" value="<?php echo (($detail["shop_id"])?($detail["shop_id"]):''); ?>" class="manageInput" />
                            <input type="text" name="shop_name" id="shop_name"   value="<?php echo ($shops["shop_name"]); ?>" class="scAddTextName w150 sj"/>
                        </div>
                        <a mini="select"  w="800" h="600" href="<?php echo U('shop/select');?>" class="seleSj">选择商家</a>
                        <code>可选，可以文章关联商家哦！</code>
                    </td>
                </tr>
                    
                

                <tr>
                    <td class="lfTdBt">分类：</td>
                    <td class="rgTdBt">

                        <select name="parent_id" id="parent_id" class="seleFl w100"  style="display: inline-block; margin-right: 10px;">
                            <option value="0">请选择...</option>
                            <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): ?><option value="<?php echo ($var["cate_id"]); ?>"  <?php if(($var["cate_id"]) == $parent_id): ?>selected="selected"<?php endif; ?> ><?php echo ($var["cate_name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
                        <select id="cate_id" name="data[cate_id]" class="seleFl w100" style="display: inline-block; margin-right: 10px;">
                            <option value="0">请选择...</option>
                            <?php if(is_array($cates)): foreach($cates as $key=>$var): if(($var["parent_id"]) == "0"): if(($var["cate_id"]) == $parent_id): if(is_array($cates)): foreach($cates as $key=>$var2): if(($var2["parent_id"]) == $var["cate_id"]): ?><option value="<?php echo ($var2["cate_id"]); ?>"  <?php if(($var2["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> ><?php echo ($var2["cate_name"]); ?></option>
                                    <?php if(is_array($cates)): foreach($cates as $key=>$var3): if(($var3["parent_id"]) == $var2["cate_id"]): ?><option value="<?php echo ($var3["cate_id"]); ?>"  <?php if(($var3["cate_id"]) == $detail["cate_id"]): ?>selected="selected"<?php endif; ?> >&nbsp;&nbsp;-<?php echo ($var3["cate_name"]); ?></option><?php endif; endforeach; endif; endif; endforeach; endif; endif; endif; endforeach; endif; ?>
                        </select>
                        <script>
                            $(document).ready(function(e){
                                $("#parent_id").change(function(){
                                    var url = '<?php echo U("articlecate/child",array("parent_id"=>"0000"));?>';
                                    if($(this).val() > 0){
                                        var url2 = url.replace('0000',$(this).val());
                                        $.get(url2,function(data){
                                            $("#cate_id").html(data);
                                        },'html');
                                    }
                                });
                                
                            });
                        </script>
                        <code>必选哦</code>
                    </td>
                    
                </tr>    
                <tr>
                    <td class="lfTdBt">标题：</td>
                    <td class="rgTdBt"><input type="text" name="data[title]" value="<?php echo (($detail["title"])?($detail["title"]):''); ?>" class="manageInput" />
					<code>输入文章标题</code>
                    </td>
                </tr><tr>
                    <td class="lfTdBt">来源：</td>
                  <td class="rgTdBt"><input type="text" name="data[source]" value="<?php echo (($detail["source"])?($detail["source"]):''); ?>" class="manageInput" />
					<code>文章来源地，建议不要去抄别人有版权的文章~！</code>
                    </td>
                </tr><tr>
                    <td class="lfTdBt">关键字：</td>
                  <td class="rgTdBt"><input type="text" name="data[keywords]" value="<?php echo (($detail["keywords"])?($detail["keywords"]):''); ?>" class="manageInput" />
                        <code>多个关键字用,逗号分隔</code>
                    </td>
                </tr><tr>
                    <td class="lfTdBt">简介：</td>
             <td class="rgTdBt"><textarea  name="data[profiles]" cols="50" rows="10" ><?php echo (($detail["profiles"])?($detail["profiles"]):''); ?></textarea>
                        <code>简单的文章简介</code>
                    </td>
                </tr><tr>
                    <td class="lfTdBt">
                <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>
                <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
                缩略图：
                </td>
                <td>
                    <div style="width: 300px;height: 100px; float: left;">
                        <input type="hidden" name="data[photo]" value="<?php echo ($detail["photo"]); ?>" id="data_photo" />
                        <input id="photo_file" name="photo_file" type="file" multiple="true" value="" />
                    </div>
                    <div style="width: 300px;height: 100px; float: left;">
                        <img id="photo_img" width="80" height="80"  src="__ROOT__/attachs/<?php echo (($detail["photo"])?($detail["photo"]):'default.jpg'); ?>" />
                        <a href="<?php echo U('setting/attachs');?>">缩略图设置</a>
                        建议尺寸<?php echo ($CONFIG["attachs"]["article"]["thumb"]); ?>
                    </div>
                    <script>
                            $("#photo_file").uploadify({
                                'swf'      : '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                                'uploader' : '<?php echo U("app/upload/uploadify",array("model"=>"article"));?>',
                                'cancelImg' : '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                                'buttonText' : '上传缩略图',
                                'fileTypeExts': '*.gif;*.jpg;*.png',
                                'queueSizeLimit':1,
                                'onUploadSuccess' : function(file, data, response) {
                                    $("#data_photo").val(data);
                                    $("#photo_img").attr('src','__ROOT__/attachs/'+data).show();
                                }
                            });
             
                    </script>
                </td>
            </tr><tr>
            <td class="lfTdBt">详细内容：</td>
            <td class="rgTdBt">
                <script type="text/plain" id="data_details" name="data[details]" style="width:800px;height:360px;"><?php echo ($detail["details"]); ?></script>
            </td>
        </tr>
        <link rel="stylesheet" href="__PUBLIC__/umeditor/themes/default/css/umeditor.min.css" type="text/css">
        <script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/umeditor/lang/zh-cn/zh-cn.js"></script>
        <script>
            um = UM.getEditor('data_details', {
                imageUrl:"<?php echo U('app/upload/editor');?>",
                imagePath:'__ROOT__/attachs/editor/',
                lang:'zh-cn',
                langPath:UMEDITOR_CONFIG.UMEDITOR_HOME_URL + "lang/",
                focus: false
            });
        </script>
        <tr>
            <td class="lfTdBt">浏览量：</td>
         <td class="rgTdBt"><input type="text" name="data[views]" value="<?php echo (($detail["views"])?($detail["views"]):''); ?>" class="manageInput" />
		<code>可以不填写，前台展示。</code>
            </td>
        </tr>
        
         <tr>
            <td class="lfTdBt">排序：</td>
         <td class="rgTdBt"><input type="text" name="data[orderby]" value="<?php echo (($detail["orderby"])?($detail["orderby"]):''); ?>" class="manageInput" />
		<code>默认100，可以不修改，数字越小，排名越前面！</code>
            </td>
        </tr>
        
        
        
        
        <!--增加开始-->
        <tr>
                    <td class="lfTdBt">是否头条：：</td>
                    <td class="rgTdBt">
                   <input type="radio" name="data[istop]" value="0" <?php if($detail[istop] == 0): ?>checked="checked"<?php endif; ?> />不加头条
				<input type="radio" name="data[istop]" value="1" <?php if($detail[istop] == 1): ?>checked="checked"<?php endif; ?> />加入头条

                    </td>
                </tr>
                
       <tr>
                    <td class="lfTdBt">是否加入幻灯：</td>
                    <td class="rgTdBt">
                  <input type="radio" name="data[isroll]" value="0" <?php if($detail[isroll] == 0): ?>checked="checked"<?php endif; ?> />不加幻灯
				<input type="radio" name="data[isroll]" value="1" <?php if($detail[isroll] == 1): ?>checked="checked"<?php endif; ?> />加入幻灯
                    </td>
       </tr>
       <!--增加结束-->     
       
       <tr>
                    <td class="lfTdBt">是否开启评论：</td>
                    <td class="rgTdBt">
                  <input type="radio" name="data[valuate]" value="0" <?php if($detail[valuate] == 0): ?>checked="checked"<?php endif; ?> />开启
				<input type="radio" name="data[valuate]" value="1" <?php if($detail[valuate] == 1): ?>checked="checked"<?php endif; ?> />不开启
                <code>默认开启，关闭后不显示评论！</code>
                    </td>
       </tr>
        <tr>
        
        
        
        
       
    </table>
            <div class="smtQr"><input type="submit" value="确认编辑" class="smtQrIpt" /></div>
</form>
</div>
</div>

     
        
</div>
</body>
</html>