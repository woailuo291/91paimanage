<?php if (!defined('THINK_PATH')) exit();?><div class="listBox clfx">
    <div class="menuManage">
        <form target="baocms_frm" action="<?php echo U('menu/edit',array('menu_id'=>$detail['menu_id']));?>" method="post">
            <div class="mainScAdd">
                <div class="tableBox">
                    <table bordercolor="#e1e6eb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                        <tr>
                            <td class="lfTdBt">上级菜单：</td>
                            <td class="rgTdBt">
                                <select name="data[parent_id]" class="seleFl w200">
                            <option value="0">一级菜单</option>
                            <?php if(is_array($datas)): foreach($datas as $key=>$var): if(($var["parent_id"] == 0)): ?><option value="<?php echo ($var["menu_id"]); ?>"   <?php if(($var["menu_id"]) == $detail[parent_id]): ?>selected="selected"<?php endif; ?> ><?php echo ($var["menu_name"]); ?></option><?php endif; endforeach; endif; ?>       
                        </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="lfTdBt">模块名称：</td>
                            <td class="rgTdBt">
                                <input name="data[menu_name]" type="text" class="scAddTextName w200" />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="smtQr"><input type="submit" value="确认修改" class="smtQrIpt" /></div>
            </div>
        </form>
    </div>
</div>