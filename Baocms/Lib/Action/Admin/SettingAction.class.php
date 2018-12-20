<?php

class SettingAction extends CommonAction
{
    private $edit_fields = array('details');
    public function site()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'site', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/site'));
        } else {
            $this->assign('citys', D('City')->fetchAll());
            $this->assign('ranks', D('Userrank')->fetchAll());
            //增加分销
            $this->display();
        }
    }
    public function quanming()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'quanming', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/quanming'));
        } else {
            $this->display();
        }
    }
    public function attachs()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'attachs', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/attachs'));
        } else {
            $this->display();
        }
    }
    public function mall()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'mall', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/mall'));
        } else {
            $this->display();
        }
    }
    public function ucenter()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'ucenter', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/ucenter'));
        } else {
            $this->display();
        }
    }
    public function sms()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'sms', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/sms'));
        } else {
            $this->display();
        }
    }
    public function weixin()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'weixin', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/weixin'));
        } else {
            $this->display();
        }
    }
    //信鸽
    public function jpush()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'jpush', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/jpush'));
        } else {
            $this->display();
        }
    }
    public function weixinmenu()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            D('Weixin')->weixinmenu($data);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'weixinmenu', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/weixinmenu'));
        } else {
            $this->display();
        }
    }
    public function connect()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'connect', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/connect'));
        } else {
            $this->display();
        }
    }
    public function integral()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'integral', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/integral'));
        } else {
            $this->display();
        }
    }
    public function weidian()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'weidian', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/weidian'));
        } else {
            $this->display();
        }
    }
    public function prestige()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'prestige', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/prestige'));
        } else {
            $this->display();
        }
    }
    public function mail()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'mail', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/mail'));
        } else {
            $this->display();
        }
    }
    public function mobile()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'mobile', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/mobile'));
        } else {
            $this->display();
        }
    }
    public function housework()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'housework', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/housework'));
        } else {
            $this->display();
        }
    }
    public function updateapp()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data['time'] = time();
            $data = serialize($data);
            D('Setting')->save(array('k' => 'updateapp', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/updateapp'));
        } else {
            $this->display();
        }
    }
    public function other()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'other', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/other'));
        } else {
            //$this->assign('citys',D('City')->fetchAll());
            $this->display();
        }
    }
    public function operation()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'operation', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/operation'));
        } else {
            $this->display();
        }
    }
    public function register()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'register', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('设置成功', U('setting/register'));
        } else {
            $this->display();
        }
    }
    public function share()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'share', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('分享设置成功', U('setting/share'));
        } else {
            $this->display();
        }
    }
    public function cash()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'cash', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('提现设置成功', U('setting/cash'));
        } else {
            $this->display();
        }
    }
	public function collects()
    {
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'collects', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('采集设置成功', U('setting/collects'));
        } else {
            $this->display();
        }
    }
	public function search(){
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'search', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('搜索设置成功', U('setting/search'));
        } else {
            $this->display();
        }
    }
	 public function sms_shop(){
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'sms_shop', 'v' => $data));
            D('Setting')->cleanCache();
            $this->baoSuccess('购买短信设置成功', U('setting/sms_shop'));
        } else {
            $this->display();
        }
    }
    public function robot(){
        //$list=Cac()->get('Setting_robot');
      // print_r($this->$_CONFIG);
       // print_r($list);
        if ($this->isPost()) {
            $data = $this->_post('data', false);
            $data = serialize($data);
            D('Setting')->save(array('k' => 'robot', 'v' => $data));
            D('Setting')->cleanCache();
            Cac()->set('Setting_robot',$data);
            $this->baoSuccess('机器人设置成功', U('setting/robot'));
        } else {
            $this->display();
        }

    }

    public function notice()
    {
        $User = D('Article');

        $map['article_id']=1;
       // $count = $User->where($map)->count(); // 查询满足要求的总记录数
        //$Page = new Page($count, 8); // 实例化分页类 传入总记录数和每页显示的记录数
      //  $show = $Page->show(); // 分页显示输出
        $list = $User->where($map)->select();
        $this->assign('list', $list); // 赋值数据集


        $this->display(); // 输出模板
    }
    public function noticeedit(){
        $article_id=(int)$_GET['article_id'];
        if ($article_id){
            $obj = D('Article');
            $detail = $obj->find($article_id);

            if ($this->isPost()){
                $data = $this->editNoticeCheck();
                $data['article_id'] = $article_id;
                if (false !== $obj->save($data)) {
                    $obj->cleanCache();
                    $this->baoSuccess('操作成功', U('setting/notice'));
                }

            } else {
                $this->assign('detail', $detail);
                $this->display();
            }


        }else{
            $this->baoError('请选择要编辑的内容');
        }


    }
    private function editNoticeCheck() {
        $data = $this->checkFields($this->_post('data', false), $this->edit_fields);
        $data['details'] = htmlspecialchars($data['details']);
        if (empty($data['details'])) {
            $this->baoError('内容不能为空');
        }
        return $data;
    }
}