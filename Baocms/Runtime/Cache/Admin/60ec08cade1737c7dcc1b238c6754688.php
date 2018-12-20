<?php if (!defined('THINK_PATH')) exit();?><div class="listBox clfx" style="width: 740px;">                
    <div class="main-jsgl">
        <div class="jsglNr">
            <form action="<?php echo U('menu/action',array('parent_id'=>$parent_id));?>" target="baocms_frm" method="post">
                <div class="tableBox">
                    <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="none"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;"  >
                        <tr style=" border-bottom: 1px solid #dbdbdb;">
                            <td style="text-align: left">菜单名称</td>
                            <td style="text-align: left">控制器</td>
                            <td style="text-align: left">排序</td>
                            <td style="text-align: left">是否显示</td>
                            <td style="text-align: center">操作</td>
                        </tr>
                        <tbody id="jq_action_list">
                        <?php if(is_array($datas)): foreach($datas as $key=>$var): if(($var["parent_id"]) == $parent_id): ?><tr>
                                <td><input type="text" name="data[<?php echo ($var["menu_id"]); ?>][menu_name]" value="<?php echo ($var["menu_name"]); ?>"  class="manageInput w100"/></td>
                                <td><input type="text" name="data[<?php echo ($var["menu_id"]); ?>][menu_action]" value="<?php echo ($var["menu_action"]); ?>" class="manageInput w100" /></td>
                                <td><input type="text" name="data[<?php echo ($var["menu_id"]); ?>][orderby]"    value="<?php echo ($var["orderby"]); ?>" class="manageInput w50" /></td>
                                <td>
                                    <select name="data[<?php echo ($var["menu_id"]); ?>][is_show]" class="manageSelect w100">
                                        <option value="0" <?php if(($var["is_show"]) == "0"): ?>selected="selected"<?php endif; ?> >隐藏</option>
                                        <option value="1" <?php if(($var["is_show"]) == "1"): ?>selected="selected"<?php endif; ?> >显示</option>
                                    </select>
                                </td>
                                <td>
                                    <?php echo BA('menu/delete',array("menu_id"=>$var['menu_id']),'删除','act','remberBtn');?>
                                </td>
                            </tr><?php endif; endforeach; endif; ?>
                        </tbody>
                        <tr>
                            <td colspan="5">
                                <input type="submit" class="submitbtns" value="保存"  />
                                <a href="javascript:void(0);" id="jq_action_add" class="remberBtn" >新增一行</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>

        </div>
    </div>
</div>

<style>
    .tableBox table, .tableBox table tr, .tableBox table tr td{
        border: none;
    } 
    .tableBox table tr td a{
        color: #fff !important;
    }
    .tableBox table tr td .submitbtns{
        font: normal 14px/14px 'Microsoft Yahei';
        display: inline-block; 
        margin-left: 5px; 
        margin-top: 5px;   
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        background: #ff5a00;
        color: #fff;
        padding:0px 10px; 
        height: 30px; 
        line-height:20px;
        border: none;
        width: 60px;
    }
    
</style>
<script>
    $(document).ready(function (e) {
        var action_num = 0;
        $("#jq_action_add").click(function () {
            action_num++;
            var html = '<tr id="menu_action_' + action_num + '"> <td><input type="text" name="new[' + action_num + '][menu_name]" value=""  class="manageInput w100"/></td>   <td><input type="text" name="new[' + action_num + '][menu_action]" value="" class="manageInput w100" /></td> <td><input type="text" name="new[' + action_num + '][orderby]"    value="100" class="manageInput w50" /></td><td> <select name="new[' + action_num + '][is_show]" class="manageSelect w100"> <option value="0">隐藏</option>  <option value="1">显示</option></select></td><td><a href="javascript:void(0);" onclick="$(\'#menu_action_' + action_num + '\').remove();" class="remberBtn" >移除</a></td> </tr>';
            $("#jq_action_list").append(html);
        });
    });
</script>