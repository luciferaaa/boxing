<?php

namespace Admin\Controller;

use Common\Controller\AdminbaseController;

class LiveController extends AdminbaseController {

	protected $player_model;
    protected $live_model_new;
    protected $live_detail;

	public function _initialize() {
		parent::_initialize();
		$this->player_model = M('players');
        $this->live_model_new = M('live');
        $this->live_detail = M('detail');

	}
    /*
     * 直播列表管理页面
     * */
    public function index(){
        $format_word = array();
        $where = array();
        if($_POST['is_enable'] != "" || !empty($_POST['is_enable'])){
            $where['is_enable'] = $_POST['is_enable'];
            $format_word['is_enable'] = $_POST['is_enable'];
        }
        if($_POST['is_liveing'] != "" || !empty($_POST['is_liveing'])){
            $where['is_liveing'] = $_POST['is_liveing'];
            $format_word['is_liveing'] = $_POST['is_liveing'];
        }
        if (!empty($_POST['keyword'])) {
            $where['live_title'] = array('LIKE', "%" . $_POST['keyword'] . "%");
            $format_word['keyword'] = $_POST['keyword'];
        }
        if (!empty($_POST['live_start']) || !empty($_POST['live_end'])) {
            $where['live_start'] = array('EGT', $_POST['live_start']);
            $where['live_end'] = array('ELT', $_POST['live_end']);
            $format_word['live_start'] = $_POST['live_start'];
            $format_word['live_end'] = $_POST['live_end'];
        }

        $live_model = $this->live_model_new;
        $count= $live_model->where($where)->count();
        $page = $this->page($count, 10);
        $result = $live_model->where($where)->order()
            ->limit($page->firstRow. ',' . $page->listRows)
            ->select();
        $this->assign("page",$page->show('Admin'));
        $this->assign("format",$where);
        $this->assign("format_word",$format_word);
        $this->assign('data',$result);
        $this->display();

    }
    /*
     * 直播添加页面
     * */
	public function add() {
		$players = $this->player_model->select();
		$this->assign('players', $players);
		$this->display();
	}
    /*
     * 直播添加操作
     * */
    public function live_add_post(){
        $model = $this->live_model_new;
        $data = array(
            'live_title' => $_POST['live_title'],
            'live_url' => $_POST['live_url'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'live_person_count' => $_POST['live_person_count'],
            'live_header_img' => $_POST['smeta']['thumb'],
            'add_time' => date('y-m-d h:i:s'),
            'live_status' => $_POST['live_status'],
            'is_person_show' => $_POST['is_person_show'],
            'live_textarea' => $_POST['live_textarea'],
            'live_round' => $_POST['live_round'],
            'player_one_id' => $_POST['player_one_id'],
            'player_two_id' => $_POST['player_two_id']
        );
        if (IS_POST) {
            $r = $model->add($data);
            if($r !== false) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        }else{
            $this->error('添加失败');
        }
    }
    /*
     * 编辑页面
     * */
	public function edit() {
		$id = $_GET['id'];
        $model = $this->live_model_new = M('live');
		$data = $model->where(array('id'=>$id))->find();
        $players = $this->player_model->select();
        $this->assign('players', $players);
		$this->assign('data', $data);
		$this->display();
	}
	/*
	 * 编辑保存操作
	 * */
	public function live_save_post(){
        $model = $this->live_model_new;
        $id = $_POST['id'];
        $data = array(
            'live_title' => $_POST['live_title'],
            'live_url' => $_POST['live_url'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'live_person_count' => $_POST['live_person_count'],
            'live_header_img' => $_POST['smeta']['thumb'],
            'live_status' => $_POST['live_status'],
            'is_person_show' => $_POST['is_person_show'],
            'live_textarea' => $_POST['live_textarea'],
            'live_round' => $_POST['live_round'],
            'player_one_id' => $_POST['player_one_id'],
            'player_two_id' => $_POST['player_two_id']
        );
        if (IS_POST) {
            $r = $model->where(array('id'=>$id))->save($data);
            if($r !== false) {
                $this->success('保存成功');
            } else {
                $this->error('保存失败');
            }
        }else{
            $this->error('保存失败');
        }
    }
    /*
     * 根据直播id生成比较回合
     * */
    public function build_detail(){
        $round_name_array = array(
            '1' => '一',
            '2' => '二',
            '3' => '三',
            '4' => '四',
            '5' => '五',
            '6' => '六',
            '7' => '七',
            '8' => '八',
            '9' => '九',
            '10' => '十',
        );
        $detail_model = $this->live_detail;
        $live_model = $this->live_model_new;
        $play_model = $this->player_model;
        $r = false;
        if(I('get.id')){
            $id = I('get.id');
            $live_data = $live_model->where(array('id' => $id))->find();
            $count = $detail_model->where(array('live_id' => $id))->count();
            if(!empty($live_data['live_round']) && $live_data['live_round'] != 0 && $count < 1) {
                for ($i=1;$i<=$live_data['live_round'];$i++) {
                    $data_detail = array(
                        'live_id' => $id,
                        'detail_title' => '第'.$round_name_array[$i].'场',
                        'player_one_id' => $live_data['player_one_id'],
                        'player_one_msg' => json_encode($play_model->where(array('id' => $live_data['player_one_id']))->find()),
                        'player_two_id' => $live_data['player_two_id'],
                        'player_two_msg' => json_encode($play_model->where(array('id' => $live_data['player_two_id']))->find()),
                        'round_state' => 0
                    );
                    $r = $detail_model->add($data_detail);
                }
            }
            if($r !== false){
                $this->success("生成成功！");
            }else{
                $this->error("生成失败！");
            }
        }else{
            $this->error("生成失败！");
        }
    }
    /*
     * 根据id获取回合信息列表
     * */
    public function liveDetail(){
        $detail_model = $this->live_detail;
        $data = $detail_model->select();
        if(!empty($data)) {
            foreach ($data as $k => $v) {
                $player_one_msg_array = json_decode($v['player_one_msg'],true);
                $data[$k]['player_one_name'] = $player_one_msg_array['name'];
                $player_two_msg_array = json_decode($v['player_two_msg'],true);
                $data[$k]['player_two_name'] = $player_two_msg_array['name'];
            }
        }
        $this->assign('data', $data);
        $this->display();
    }
    /*
     * 回合信息编辑页面
     * */
    public function liveDetailEdit(){
        $id = I('get.id');
        $detail_model = $this->live_detail;
        $players = $this->player_model->select();
        $data = $detail_model->where(array('id' => $id))->find();
        $this->assign('players', $players);
        $this->assign('data', $data);
        $this->display();
    }
    /*
     * 回合信息保存
     * */
    public function liveDetailPostSave(){
        $id = $_POST['id'];
        $detail_model = $this->live_detail;
        $data = array(
            'detail_title' => $_POST['detail_title'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'match_money_count' => $_POST['match_money_count'],
            'round_state' => $_POST['round_state'],
            'is_match_show' => $_POST['is_match_show']
        );

        if (IS_POST) {
            $r = $detail_model->where(array('id'=>$id))->save($data);
            if($r !== false) {
                $this->success('保存成功');
            } else {
                $this->error('保存失败');
            }
        }else{
            $this->error('保存失败');
        }
    }

}
