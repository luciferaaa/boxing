<?php
/**
 * Created by PhpStorm.
 * User: 于政
 * Date: 2016/9/1
 * Time: 10:15
 * 功能 :微信平台管理
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class WeiXinController extends AdminbaseController{
    protected $weixin_token_model;
    protected $weixin_setting_model;
    function _initialize() {
        parent::_initialize();
        $this->weixin_token_model = D("Common/WeiXinToken");
        $this->weixin_setting_model = D("Common/WeiXinSetting");
    }
    /**
     * 当前access_token
     **/
    public function setting(){
        $model = $this->weixin_token_model;
        $data = $model->find();
        $this->assign("data",$data);
        $this->display();
    }
    /**
     * 更新access_token
     **/
    public function details(){
        $model = $this->weixin_setting_model;
        $data = $model->find();
        $this->assign("data",$data);
        $this->display();
    }
    /**
     * 保存数据
     **/
    function weixin_post(){
        if (IS_POST) {
            $model = $this->weixin_setting_model;
            $appid = I('appid');
            $secert = I('secert');
            $url = I('url');
            $id = I('id');
            $mch_id = I('mch_id');
            $key = I('key');
            $data = array(
                'id' => $id,
                'secert' => $secert,
                'appid' => $appid,
                'redirect_url' => $url,
                'mch_id' => $mch_id,
                'key' => $key
            );
            $datebase_data = $model->find();
            if($datebase_data['appid'] == $appid && $datebase_data['secert'] == $secert && $datebase_data['redirect_url'] == $url && $datebase_data['mch_id'] == $mch_id && $datebase_data['key'] == $key){
                $this->error("没有做任何更改");
            }
            if($model->save($data) == 1){
                $this->weixin_setting_update();
            }else{
                $this->error('保存失败');
            }
        }else{
            $this->error("提交参数错误");
        }

    }
    /**
     * 更新微信配置文件
     **/
    public function weixin_setting_update(){
        $file = fopen("data/conf/config.ini.php",'w') or die("没有找到配置文件");
        $data = D("WeiXinSetting")->find();
        $text = "<?php\n";
        $text .= "return array(\n'APP_ID' => '".$data['appid']."',\n'SECERT' => '".$data['secert']."',\n'REDIRECT' => '".$data['redirect_url']."',\n'MCH_ID' => '".$data['mch_id']."',\n'KEY'=>'".$data['key']."'\n);";
        $r = fwrite($file,$text);
        if($r){
            $this->success("更新成功");
        }else{
            $this->error("更新失败");
        }
        fclose($file);
    }

}