<?php

namespace Admin\Controller;

use Common\Controller\AdminbaseController;

class LiveController extends AdminbaseController {
	
	protected $live_model;
	protected $player_model;

	public function _initialize() {
		parent::_initialize();	
		$this->live_model = M('live_list');
		$this->player_model = M('players');
	}

	public function index() {
		$live_list = $this->live_model->select();
		foreach($live_list as $key => $value) {
            $red_name_array = $this->player_model->where(array('id'=>$value['player_red_id']))->select();
			$live_list[$key]['red_name'] = $red_name_array[0]['name'];
            $blue_name_array = $this->player_model->where(array('id'=>$value['player_blue_id']))->select();
			$live_list[$key]['blue_name'] = $blue_name_array[0]['name'];
		}
		$this->assign('liveList', $live_list);
		$this->display();
	}

	public function add() {
		$players = $this->player_model->select();
		$this->assign('plaers', $players);
		$this->display();
	}

	public function addPort() {
		if(IS_POST) {
			$data = array(
				'name' => $_POST['name'],
				'leaves' => $_POST['leaves'],
				'rounds' => $_POST['rounds'],
				'player_red_id' => $_POST['player_red_id'],
				'player_blue_id' => $_POST['player_blue_id'],
				'image' => $_POST['image'],
				'link' => $_POST['link'],
				'player_red_base_num' => $_POST['player_red_base_num'],
				'player_blue_base_num' => $_POST['player_blue_base_num'],
				'money' => $_POST['money'],
				'watcher_base_num' => $_POST['watcher_base_num'],
				'place' => $_POST['place'],
				'date' => $_POST['date']
            );
			$r = $this->live_model->where(array('id'=>$data['id']))->add($data);
			if($r !== false) {
				$this->success('添加成功');
			} else {
				$this->error('添加失败');
			}
		}
	}

	public function edit() {
		$id = $_GET['id'];
		$data = $this->live_model->where(array('id'=>$id))->select();
		$players = $this->player_model->select();
		$this->assign('data', $data[0]);
		$this->assign('players', $players);
		$this->display();
	}

	public function editPort() {
		if(IS_POST) {
			$data = array(
				'id' => $_POST['id'],
				'name' => $_POST['name'],
				'leaves' => $_POST['leaves'],
				'rounds' => $_POST['rounds'],
				'player_red_id' => $_POST['player_red_id'],
				'player_blue_id' => $_POST['player_blue_id'],
				'image' => $_POST['image'],
				'link' => $_POST['link'],
				'player_red_base_num' => $_POST['player_red_base_num'],
				'player_blue_base_num' => $_POST['player_blue_base_num'],
				'money' => $_POST['money'],
				'watcher_base_num' => $_POST['watcher_base_num'],
				'place' => $_POST['place'],
				'date' => $_POST['date']
            );
			$r = $this->live_model->where(array('id'=>$data['id']))->save($data);
			if($r !== false) {
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}
	}


}
