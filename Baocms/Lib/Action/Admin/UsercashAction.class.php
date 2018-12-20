<?php

class UsercashAction extends CommonAction {

    private $edit_fields = array('user_name', 'bank_num', 'bank_info');
    public function index() {
        $Userscash = D('Tixian');
      // $yue=D('Users');
        import('ORG.Util.Page'); // 导入分页类
        $map = array();
        $map['status']=0;
        $map['blacklist']=0;
        $count = $Userscash->where($map)->count(); // 查询满足要求的总记录数
        $dai_tixian = $Userscash->where($map)->sum("money"); // 查询满足要求的总记录数
        $Page = new Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        $list = $Userscash->where($map)->order(array('ID' => 'desc'))->limit($Page->firstRow . ',' . $Page->listRows)->select();
        foreach($list as $k=>$val){
            $val['money_yu']=D('Users')->getUserMoney($val['user_id']);
            $val['bank_num']=$this->getbankInfo($val['user_id'],0);
          $val['bank_userName']=$this->getbankInfo($val['user_id'],1);
            $val['bank_info']=$this->getbankInfo($val['user_id'],2);
            $list[$k] = $val;
        }


        $this->assign('dai_tixian', $dai_tixian); // 赋值数据集
        $this->assign('list', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->display(); // 输出模板
    }
    private function getbankInfo($user_id,$type){
        $bank=D('Bank');
      $map=array();
      $map['user_id']=$user_id;
       $bankinfo= $bank->where($map)->find();
       switch ($type){
           case 0:
               return $bankinfo['bank_num'];
            break;
           case 1:
                 return $bankinfo['user_name'];
               break;
           case 2:
               return $bankinfo['bank_info'];
               break;

       }


    }
	public function gold() {
        $Userscash = D('Userscash');
        import('ORG.Util.Page'); // 导入分页类
        $map = array('type' => shop);
        if ($account = $this->_param('account', 'htmlspecialchars')) {
            $map['account'] = array('LIKE', '%' . $account . '%');
            $this->assign('account', $account);
        }
        $count = $Userscash->where($map)->count(); // 查询满足要求的总记录数 
        $Page = new Page($count, 25); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        $list = $Userscash->where($map)->order(array('cash_id' => 'desc'))->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $ids = array();
        foreach ($list as $row) {
            $ids[] = $row['user_id'];
        }
        $Usersex = D('Usersex');
        $map = array();
        $map['user_id'] = array('in', $ids);
        $ex = $Usersex->where($map)->select();
        $tmp = array();
        foreach ($ex as $row) {
            $tmp[$row['user_id']] = $row;
        }
        foreach ($list as $key => $row) {
            $list[$key]['bank_name'] =  empty($list[$key]['bank_name']) ? $tmp[$row['user_id']]['bank_name'] :$list[$key]['bank_name'];
            $list[$key]['bank_num'] =  empty($list[$key]['bank_num']) ? $tmp[$row['user_id']]['bank_num'] :$list[$key]['bank_num'];
            $list[$key]['bank_branch'] =  empty($list[$key]['bank_branch']) ? $tmp[$row['user_id']]['bank_branch'] :$list[$key]['bank_branch'];
            $list[$key]['bank_realname'] =  empty($list[$key]['bank_realname']) ? $tmp[$row['user_id']]['bank_realname'] :$list[$key]['bank_realname'];
        }
        $this->assign('list', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->display(); // 输出模板
    }
public function zfbpass($cash_id = 0,$status = 0){//
    //判断$cash_id打款状态是否待通过
    $Userscash = D('Tixian');
    if (is_numeric($cash_id) && ($cash_id = (int) $cash_id)) {
        $data = $Userscash->find($cash_id);
        if ($data['status'] == 0) {
           // $this->zfbpassEvent($cash_id,$zfb_name,$zfb,$money,$status);
            $this->audit($cash_id,$status);
        }else{
            $this->baoError('该用户已经打款，请刷新页面');
            return;
        }
    }else{
        $this->baoError('数据异常，请刷新页面');
        return;
    }

}

private function zfbpassEvent($cash_id = 0,$zfb_name,$zfb,$money,$status = 0){

    Vendor('zfbaop.AlipayFundTransToaccountTransferRequest');
    Vendor('zfbaop.AopClient');
    Vendor('zfbaop.SignData');

 $aop = new \AopClient();

$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
    $aop->appId = '2018072460818294';
    $aop->rsaPrivateKey = 'MIIEpAIBAAKCAQEAsCDsI/MjmOSYqrAqCBAUlV8E7CmF6g9QrjziCv646D/bDrAEwDQrkLO2xBq3yNbhTco7zRJK3Ac0xPRXXvE4zOTuBBwQiugJIb0n8rxnjw/54bT6MoHYRlbkJICFkNJucCUPWSHC5WRhqcaznOIr9TtDkJZtMVUMqWdFg0tmhL4r3WAJEYoxDeJIRcLWY/CTGGGOCXQKXxCqjOZiMroWnIFJeEYs6nGIbtwDoe3mE7glZ0nMf0fKKcdgxIQIyRB8d87gp9KiuKqOv3L2bosdf+JLEikHx46pQFH3udUIujAZK2bqLuCWjV53u8e/wXBswTw+giAUfagyC7vLPbmIpwIDAQABAoIBAQCfordlPhKdmVPmIRV3iVuepyjHBDukEY2G3xfh702Y84eQoGkt7BswZDLbO3woRNqgrxPUoyfGlaF2giBOpUReMYCpqOY1gGoGcnOqxqj2Ofy6XlYHQTjNSCQwEWz9/jyq2Gw41SjY0UrTno1dPIGrG7P5cN43QGbhhAC1J7obxOEA+jugbqAx+NZ1ovkg1OJed2g12b1b5p2N1KAaw+KIf2j1CxIBbAvfBfOjZBxVIFOroi22UO65eg4Ytdw+EC5mkt0RDIg00xJ7m0G3T5Ee35Dt2vEyjxz603kszdNDuZtZobGWXlqOmcTU4f6Z5MlptTJr9pGTye3mJ1wt8kNBAoGBANTyD2CsvzCcs4NDyqApoy+DOQBfJoFCrdYNcMsmjPM2kapi0ox4ab1PjIVbN9CSCJgexdtObPtvnvg0O5KKbs1lqqgkGLhFA1w4u+R1yOwkwmlhN3ay3hWQ1/70J/dWWKbNCZcbDFEY0Lf63LLyG6KFKfnOUFmhEv1VI6s4xVNFAoGBANO9PQUYCPTJM2wYX8oWhcgJlVZonRjlEOdfa3ZdbI4foHQSBV6tImNC0KvZuh6AAr6APcX81UTxN04Ju353z8vdjpHvFY2hfrBGCz4pXf9ekcN/3VUH3NB2RnqL7fSYFuP1xUvwsjzHqWuQV/OOHlW0gmhqrdk6CbM/YXea+ZT7AoGAfNbQBxgfGguz/e9/WfgvEAq5HyupMjx6FzRX/PFDzs4eBarbzrhFHVQGiKPai+8hFLVtv00x/RIKO267wgRgQxAoRVysFVN4TdeA58XZnf9K7matEmx4YGJDDtfqmklHvboUtj6IMP8AVeu++TWQ1+2Dl0zJtFIHBPel6ppkrJUCgYAkTTl8+hXvAd/TFIq3twzQsvPrkJv+fKddQ7rE3FeUNk/oFn7dMInIwtfL3tRODlxqFMqCe0qFO2Xj9z8x+5CgvyeGVZs4YQu7ZQbgbW80LR6Iig+EWIi/JMgIkp0FZl3mT2i4EFg+m2ysiF7L3v3Ma9o/1Kphp9Wp6Z/oRaWsqQKBgQCd8dAmYfuj37/QCX7uYMz1ht9byjGrsyLUB/pZPYUfXed6bjfn4MN9a/onDTWNxe2eZsT6bcPcHyQlkwi3TbgkzDTExeNh7C97zI3UvvR4W9DqMlwnSAfgDUjmNVGGgr38ioSp4Qa16q6LCFoglzQqTblShfqYMRtBxyy2jTLxUg==';
    $aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAlG4uYdLEB714qMfwTUqzjqRV8DTS9e/BSj5/IMK3YIHkdpU+ZKhvGdeB7JZNv5XVcfR5gXwTZDt95Vhb2K3rxdgTKcgHCW5blF14obdTMl6CYniCec3cprk/MPJBNa64RPLtgieeDvIGpCFGqwbEIDxBzOb9QTV7Q5P3Ous+WEI5waHo/gZXZdBPtAO8KxzqF7o24bG+cDMtMbyCdTRgNmx7aLk5DwruFaX1EkMivrGKG7Ei3oUMfiSw2UHIFVH00/cmN3JIayhiwLXol6GCFfoHjWgHACsmm/jzpswT4MZgcZTP51OOn8blNxvkNb1aRdzkBiRRg3pQ332n+vXygQIDAQAB';
    $aop->apiVersion = '1.0';
    $aop->postCharset='UTF-8';
$aop->format='json';
 $request = new \AlipayFundTransToaccountTransferRequest();
    $ord_id=time().rand(999,9999);
    $money=$money / 100;
    $zfb=str_replace("+","",$zfb);
    $request->setBizContent("{" .
        "\"out_biz_no\":\"$ord_id\"," .
        "\"payee_type\":\"ALIPAY_LOGONID\"," .
        "\"payee_account\":\"$zfb\"," .
        "\"amount\":\"$money\"," .
        "\"payer_show_name\":\"DarkHorse\"," .
        "\"payee_real_name\":\"$zfb_name\"," .
        "\"remark\":\"DarkHorse\"" .
        "}");

    $result = $aop->execute ($request);

    $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
    $resultCode = $result->$responseNode->code;

    if(!empty($resultCode)&&$resultCode == 10000){
       // echo "成3功";
        //调用支付宝
        $this->audit($cash_id,$status);
    } else {
        $this->baoError($resultCode);
    }

}
    private function audit($cash_id = 0, $status = 0) {

        if (!$status)
            $this->baoError('参数错误');
        $Userscash = D('Tixian');
        if (is_numeric($cash_id) && ($cash_id = (int) $cash_id)) {
            $data = $Userscash->find($cash_id);
            if ($data['status'] == 0) {
                $arr= array();
                $arr['ID'] = $cash_id;

                $mp = array();
                $mp['status'] = $status;
                $mp['pass_time']=time();
                $mp['pass_ord_id']='1111';

               $Userscash->where($arr)->save($mp);

                //微信通知
              //  $this->remainMoneyNotify($data['user_id'],$data['money']);


              $this->baoSuccess('操作成功！', U('usercash/index'));
            }
            else
            {
                $this->baoError('请不要重复操作');
            }
        } else {
            $cash_id = $this->_post('user_id', FALSE);
            if (!is_array($cash_id)) {
                $this->baoError('请选择要审核的提现');
            }
            foreach ($cash_id as $id) {
                $data = $Userscash->find($id);
                if ($data['status'] > 0) {
                    continue;
                }
                $arr = array();
                $arr['ID'] = $id;
                $arr['status'] = $status;
                $Userscash->save($arr);
                //微信通知
              //  $this->remainMoneyNotify($data['ID'],$data['money']);
                //如果是拒绝则返还钱
            }
            $this->baoSuccess('操作成功！', U('usercash/index'));
        }
    }
	//商户提现
	 public function audit_gold($cash_id = 0, $status = 0) {
        if (!$status)
            $this->baoError('参数错误');
        $Userscash = D('Userscash');
        if ($cash_id = (int) $cash_id){
            $data = $Userscash->find($cash_id);
            if ($data['status'] == 0) {
                $arr = array();
                $arr['cash_id'] = $cash_id;
                $arr['status'] = $status;
                $Userscash->save($arr);
                //微信通知
                $this->remainMoneyNotify($data['user_id'],$data['money']);
                $this->baoSuccess('操作成功！', U('usercash/gold'));
            }
            else{
                $this->baoError('操作失败');
            }
       
        }
    }

	//拒绝用户提现
    public function jujue() {
        $status = (int) $_POST['status'];
        $cash_id = (int)$_POST['cash_id'];
        $value = $this->_param('value', 'htmlspecialchars');
        if(empty($value)){
            $this->ajaxReturn(array('status'=>'error','msg'=>'拒绝理由请填写'));
		}
        if(empty($cash_id)|| !$detail = D('Tixian')->find($cash_id)){
            $this->ajaxReturn(array('status'=>'error','msg'=>'参数错误'));
        }
        $money = $detail['money'];
        if($status == 2){
            D('Users')->addMoney($detail['user_id'], $money, '提现拒绝，退款');
            D('Userscash')->save(array('cash_id'=>$cash_id,'status'=>$status,'reason'=>$value));
			//微信通知
            $this->remainMoneyNotify($data['user_id'],$data['money']);
            $this->ajaxReturn(array('status'=>'success','msg'=>'拒绝退款操作成功','url'=>U('usercash/index')));
        }
    }
	//拒绝商家提现
	 public function jujue_gold() {
        $status = (int) $_POST['status'];
        $cash_id = (int)$_POST['cash_id'];
        $value = $this->_param('value', 'htmlspecialchars');
        if(empty($value)){
            $this->ajaxReturn(array('status'=>'error','msg'=>'拒绝理由请填写'));
		}
        if(empty($cash_id)|| !$detail = D('Userscash')->find($cash_id)){
            $this->ajaxReturn(array('status'=>'error','msg'=>'参数错误'));
        }
        $money = $detail['money'];
        if($status == 2){
            D('Users')->Money($detail['user_id'], $money, '提现拒绝，退款');
            D('Userscash')->save(array('cash_id'=>$cash_id,'status'=>$status,'reason'=>$value));
			//微信通知
            $this->remainMoneyNotify($data['user_id'],$data['money']);
            $this->ajaxReturn(array('status'=>'success','msg'=>'拒绝退款操作成功','url'=>U('usercash/gold')));
        }
    }
	
	
    

    //微信余额通知
    private function remainMoneyNotify($uid,$money)
    {
        //余额变动,微信通知
        $openid    = D('Connect')->getFieldByUid($uid,'open_id'); 
        $order_id  = $order['order_id'];
        $uname = D('User')->getFieldByUser_id($uid,'nickname');
        $words     = "您申请的提现金额{$money}请求已通过,请注意您的账户变动！";
        if($openid){
            $template_id = D('Weixintmpl')->getFieldByTmpl_id(4,'template_id');//余额变动模板
            $tmpl_data =  array(
                'touser'      => $openid,//用户微信openid
                'url'         => 'http://'.$_SERVER['HTTP_HOST'].'/mcenter',//相对应的订单详情页地址
                'template_id' => $template_id,
                'topcolor'    => '#2FBDAA',
                'data'        => array(
                    'first'=>array('value'=>'尊敬的用户,{$uname},您的账户余额有变动！' ,'color'=>'#2FBDAA'),   
                    'keynote1'=>array('value'=> $user_name, 'color'=>'#2FBDAA'),//用户名
                    'keynote2'=>array('value'=> $words, 'color'=>'#2FBDAA'),//详情
                    'remark'  =>array('value'=>'详情请登录您的用户中心了解', 'color'=>'#2FBDAA')
                )
            );
            D('Weixin')->tmplmesg($tmpl_data);
        }
    }
    public function userpass(){
        $Userscash = D('Tixian');
        import('ORG.Util.Page'); // 导入分页类
        $map = array('status'=>1);

        $count = $Userscash->where($map)->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        $list = $Userscash->where($map)->order(array('ID' => 'desc'))->limit($Page->firstRow . ',' . $Page->listRows)->select();

        foreach($list as $k=>$val){
           // $val['money_yu']=D('Users')->getUserMoney($val['user_id']);
            $val['bank_num']=$this->getbankInfo($val['user_id'],0);
            $val['bank_userName']=$this->getbankInfo($val['user_id'],1);
            $val['bank_info']=$this->getbankInfo($val['user_id'],2);
            $list[$k] = $val;
        }


        $this->assign('list', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->display(); // 输出模板
    }
    public  function findTime(){
        $Usercard = D('Tixian');
        import('ORG.Util.Page');// 导入分页类
        $map = array();
        if(($bg_date = $this->_param('bg_date',  'htmlspecialchars') )&& ($end_date=$this->_param('end_date','htmlspecialchars'))){
            $bg_time = strtotime($bg_date);
            $end_time = strtotime($end_date);
            $map['create_time'] = array(array('ELT',$end_time),array('EGT',$bg_time));
            $this->assign('bg_date',$bg_date);
            $this->assign('end_date',$end_date);
        }else{
            if($bg_date = $this->_param('bg_date',  'htmlspecialchars')){
                $bg_time = strtotime($bg_date);
                $this->assign('bg_date',$bg_date);
                $map['create_time'] = array('EGT',$bg_time);
            }
            if($end_date = $this->_param('end_date',  'htmlspecialchars')){
                $end_time = strtotime($end_date);
                $this->assign('end_date',$end_date);
                $map['create_time'] = array('ELT',$end_time);
            }
        }
        if($user_id = (int)  $this->_param('user_id')){
            $users = D('Users')->find($user_id);
            $this->assign('nickname',$users['nickname']);
            $this->assign('user_id',$user_id);
            $map['user_id'] = $user_id;
        }

        $count      = $Usercard->where($map)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        $list = $Usercard->where($map)->order(array('card_id'=>'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();
        $user_ids = array();
        foreach($list as $k=>$val){


            $user_ids[$val['user_id']] = $val['user_id'];

        }
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('users',D('Users')->itemsByIds($user_ids));
        $this->display(); // 输出模板
    }
    public function usermoneyinfo($user_id,$val=0,$remark=null){
        $this->assign('user_id', $user_id);
        $this->assign('val', $val);
        $Userscash = D('Paid');
        import('ORG.Util.Page'); // 导入分页类

        $map['user_id'] = $user_id;
        if($val!=0){
            //具体明细
            if($val==3){
                if($remark=="zhonglei"){
                    $map['remark'] ='中雷';

                }else{

                    $map['remark'] ='用户提现';
                }

            }
            $map['type'] = $val;
        }
        $count = $Userscash->where($map)->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 15); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        $list = $Userscash->where($map)->order(array('ID' => 'asc'))->limit($Page->firstRow . ',' . $Page->listRows)->select();

        $this->assign('list', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->display(); // 输出模板

    }

public function frommoney($user_id){
    $this->assign('user_id', $user_id);
    $Userscash = D('Transfer');
    import('ORG.Util.Page'); // 导入分页类
    $map['to_id'] = $user_id;

    $count = $Userscash->where($map)->count(); // 查询满足要求的总记录数
    $Page = new Page($count, 15); // 实例化分页类 传入总记录数和每页显示的记录数
    $show = $Page->show(); // 分页显示输出
    $list = $Userscash->where($map)->order(array('ID' => 'asc'))->limit($Page->firstRow . ',' . $Page->listRows)->select();

    $this->assign('list', $list); // 赋值数据集
    $this->assign('page', $show); // 赋值分页输出
    $this->display(); // 输出模板
}

public function inbalcklist($cash_id,$status){
    $Userscash = D('Tixian');
    $arr = array();
    $arr['ID'] = $cash_id;
    $arr['blacklist'] = $status;
    $Userscash->save($arr);
    $this->baoSuccess('操作成功！', U('usercash/index'));
}


    public function blacklist() {
        $Userscash = D('Tixian');
        // $yue=D('Users');
        import('ORG.Util.Page'); // 导入分页类
        $map = array();
       // $map['status']=0;
        $map['blacklist']=1;
        $count = $Userscash->where($map)->count(); // 查询满足要求的总记录数
        $dai_tixian = $Userscash->where($map)->sum("money"); // 查询满足要求的总记录数
        $Page = new Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        $list = $Userscash->where($map)->order(array('ID' => 'desc'))->limit($Page->firstRow . ',' . $Page->listRows)->select();
        foreach($list as $k=>$val){
            $val['money_yu']=D('Users')->getUserMoney($val['user_id']);
            $val['bank_num']=$this->getbankInfo($val['user_id'],0);
            $val['bank_userName']=$this->getbankInfo($val['user_id'],1);
            $val['bank_info']=$this->getbankInfo($val['user_id'],2);
            $list[$k] = $val;
        }


        $this->assign('dai_tixian', $dai_tixian); // 赋值数据集
        $this->assign('list', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->display(); // 输出模板
    }

    private function editCheck() {
        $data = $this->checkFields($this->_post('data', false), $this->edit_fields);

        $data['user_name'] = htmlspecialchars($data['user_name']);
        if (empty($data['user_name'])) {
            $this->baoError('开户姓名不能为空');
        } $data['bank_num'] = htmlspecialchars($data['bank_num']);
        if (empty($data['bank_num'])) {
            $this->baoError('卡号不能为空');
        } $data['bank_info'] = htmlspecialchars($data['bank_info']);
        if (empty($data['bank_info'])) {
            $this->baoError('开户银行不能为空');
        }

        return $data;
    }
    public function editbankinfo($user_id)
    {
        $User = D('Bank');
        $map = array();
        $map['user_id']=$user_id;
        $list = $User->where($map)->select();
        $this->assign('list', $list); // 赋值数据集

        $this->display(); // 输出模板
    }
    public function edit() {
        $user_id=(int)$_GET['user_id'];

        if ($user_id){

            $obj = D('Bank');
            $map=array();
            $map['user_id']=$user_id;
            $detail = $obj->where($map)->find();
            if ($this->isPost()){
                $data = $this->editCheck();
               // $data['user_id'] = $user_id;

                $map['user_id']=$user_id;
                if (false !== $obj->where($map)->save($data)) {

                    $this->baoSuccess('操作成功', U('usercash/index'));

                }else{
                    $this->baoError('error1');
                }

            } else {

                $this->assign('detail', $detail);
                $this->display();
            }


        }else{

            $this->baoError('请选择要编辑的会员');
        }


    }
}