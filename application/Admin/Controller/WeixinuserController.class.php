<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/31
 * Time: 10:35
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;

class WeixinuserController extends AdminbaseController{
    private $weixin_user_model;
    function _initialize() {
        parent::_initialize();
        $this->weixin_user_model = M('weixin_user');
    }
    /**
     * 微信用户列表信息
     **/
    public function user_list(){

        if (!empty($_POST['keyword'])) {
            $where['user_nick'] = array('LIKE', "%" . $_POST['keyword'] . "%");
            $format_word['keyword'] = $_POST['keyword'];
        }

        $weixin_user_model = $this->weixin_user_model;
        $count=$weixin_user_model->where($where)->count();
        $page = $this->page($count, 10);
        $data = $weixin_user_model->limit($page->firstRow . ',' . $page->listRows)->where($where)->select();
        if(!empty($data)){
            foreach($data as $key=>$val){
                $data[$key]['msg'] = json_decode($val['msg'],true);
            }
        }
        $this->assign('page',$page->show('Admin'));
        $this->assign('data',$data);
        $this->display();
    }
}