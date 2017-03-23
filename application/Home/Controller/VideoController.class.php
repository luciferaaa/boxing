<?php
namespace Home\Controller;
use Common\Controller\MobliebaseController;
class VideoController extends MobliebaseController{
	function _initialize() {
		parent::_initialize();
	}
	// 视频列表页面
	public function video_list() {
		$video_list = M('video_list')->select();
		$players_model = M('players');
		foreach($video_list as $key => $value) {
            $red_name_array = $players_model->where(array('id'=>$value['player_red_id']))->select();
			$video_list[$key]['red_name'] = $red_name_array[0]['name'];
            $blue_name = $players_model->where(array('id'=>$value['player_red_id']))->select();
			$video_list[$key]['blue_name'] = $blue_name[0]['name'];
			$video_list[$key]['winner_name'] = $value['winner'] == '0' ? '平局' : $value['winner'] == '1' ? $video_list[$key]['red_name'] : $video_list[$key]['blue_name'];
		}
		$this->assign('video_list', $video_list);
		$this->display();
	}
}
