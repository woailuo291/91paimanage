<?php if (!defined('THINK_PATH')) exit();?><div class="listBox clfx">
    <div class="menuManage">
        <form  target="baocms_frm" action="<?php echo U('user/money',array('user_id'=>$user_id));?>" method="post">
            <div class="mainScAdd">
                <div class="tableBox">
                    <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                        <tr>
                            <td class="lfTdBt">添加余额:(元)</td>
                            <td class="rgTdBt">
                                <input name="money" type="text" class="scAddTextName w150" /><code>以元为单位</code>
                                <!--  <code>减少余额输入负数</code>-->
                            </td>
                        </tr>
                       <!-- <tr >
                            <td class="lfTdBt">原由：</td>
                            <td class="rgTdBt">
                                <textarea name="intro" cols="50" rows="6"></textarea>
                            </td>
                        </tr>-->

                    </table>
                </div>
                <div class="smtQr"><input type="submit" value="确定保存" class="smtQrIpt" /></div>
            </div>
        </form>
    </div>
</div>