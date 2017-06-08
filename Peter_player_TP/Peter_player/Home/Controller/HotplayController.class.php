<?php
namespace Home\Controller;
use THink\Controller;
class HotplayController extends Controller 
{
	const DOWNLOAD_PATH = 'Peter_player_TP/Peter_player/Public/Home/Video';
	/**
	* USAGE: show hot play video
	*/
	public function hotplay() 
	{
		//instance model and get data
		$model = M('Video');
		$field = 't1.*, t2.tb_type_name';
		$alias = 't1';
		$join = 'mp_video_type t2 on t1.tb_video_type = t2.tb_type_id';
		$order = 'tb_video_play desc';
		$where = ' 1 = 1 ';
		$where .= 'and tb_video_play > 10';
		$count = $model -> field($field) -> alias($alias) -> join($join) -> where($where) -> order($order) -> limit($limit) -> count();
		if($count) 
		{
			$page = new \Think\Page($count, 2);
			$page -> rollPage = 1;
			$page -> lastSuffix = false;
			$page -> setConfig('prev', '上一页');
			$page -> setConfig('next', '下一页');
			$page -> setConfig('last', '尾页');
			$page -> setConfig('first', '首页');
			$show = $page -> show();
			$data = $model -> field($field) -> alias($alias) -> join($join) -> where($where) -> order($order) -> limit($page -> firstRow, $page -> listRows) -> select();

		}
		if($data) 
		{
			$this -> assign('show', $show);
			$this -> assign('data', $data);
		}
		$this -> display();
	}

	/**
	* USAGE: show video simple introductin
	*/
	public function showIntro() 
	{
		$id = I('get.id');
		if($id) 
		{
			$model = M('Video');
			$field = 't1.*, t2.tb_type_name';
			$alias = 't1';
			$join = 'mp_video_type t2 on t1.tb_video_type = t2.tb_type_id';
			$data = $model -> field($field) -> alias($alias) -> join($join) -> find();
			//dump($data);die;
			if($data) 
			{
				$this -> assign('data', $data);
			}
		}
		$this -> display('Intro/intro');
	}

	/**
	* USAGE: download video
	*/
	public function download() 
	{
		$id = I('get.id');
		$data = M('Video') -> find($id);
		if ($data['tb_video_auditing'] == 0) 
		{
			echo "<script>alert('该视频还未授权，暂时无法下载！'); history.back();</script>";
		} 
		else 
		{
			$path = DOWNLOAD_PATH . $data['tb_video_address'];
			if(file_exists($path) && filesize($path) > 0) 
			{
				//download header settings
				$filename = basename($path);
				header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment; filename = " . $filename);
				header("Content-Length: " . filesize($path));
				//output buffer
				readfile($path);
			} 
			else 
			{
				echo "<script>alert('该视频已被删除或无法下载！！！'); history.back(); </script>;";
			}
		}
	}
	
}