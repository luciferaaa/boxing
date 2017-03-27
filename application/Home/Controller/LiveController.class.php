<?php
namespace Home\Controller;
use Common\Controller\MobliebaseController;
class LiveController extends MobliebaseController{

	protected $players;
	protected $live_list;
	
	function _initialize() {
		$this->players = M('players');
		$this->live_list = M('live_list');
		parent::_initialize();
	}
	// 直播详情页面
	public function live() {
		$id = $_GET['id'];
		$data = $this->live_list->where(array('id'=>$id))->select()[0];
		$red_player = $this->players->where(array('id'=>$data['player_red_id']))->select()[0];
		$blue_player = $this->players->where(array('id'=>$data['player_blue_id']))->select()[0];
		$data['player_red_name'] = $red_player['name'];
		$data['player_blue_name'] = $blue_player['name'];
		$this->assign('data', $data);
		$this->display();
	}

	public function playersPort() {
		$id = $_GET['id'];
		$data = $this->players->where(array('id'=>$id))->select()[0];
		$this->echo(json_encode($data));
	}
}
