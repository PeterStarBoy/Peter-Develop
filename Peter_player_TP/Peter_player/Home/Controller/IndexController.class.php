<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	* USAGE: show main page and play target video
	*/
    public function index()
	{
		$id = I('get.id');
		//show target video info
		if($id) 
		{
			$model = M('Video');
			$field = 't1.*, t2.tb_type_name';
			$alias = 't1';
			$join = 'mp_video_type t2 on t1.tb_video_type = t2.tb_type_id';
			$data = $model -> field($field) -> alias($alias) -> join($join) -> find($id);
			if($data) 
			{
				$this -> assign('data', $data);
				//show discuss info according to $data['tb_video_id']
				$dis_model = M('Video_discuss');
				$where = " 1 = 1 ";
				$where .= " and tb_video_id = " . $data['tb_video_id'];
				//page split come out
				$count = $dis_model -> where($where) -> count();
				if ($count) 
				{
					$page = new \Think\Page($count, 1);
					$page -> rollPage = 3;
					$page -> lastSuffix = false;
					$page -> setConfig('prev', '上一页');
					$page -> setConfig('next', '下一页');
					$page -> setConfig('last', '尾页');
					$page -> setConfig('first', '首页');
					$show = $page -> show();
					$dis_info = $dis_model -> where($where) -> limit($page -> firstRow, $page -> listRows) -> select();
					$totalRows = $page -> totalRows;
				}
				//dump($dis_info);die;
				if($dis_info) 
				{
					$this -> assign('totalrows', $totalRows);
					$this -> assign('show', $show);
					$this -> assign('dis_info', $dis_info);
				}
			}
			//previous video
			$pre_id = $id - 1;
			if(0 != $pre_id) 
			{
				$data_pre = $model -> field($field) -> alias($alias) -> join($join) -> find($pre_id);
				if ($data_pre) 
				{
					$this -> assign('data_pre', $data_pre);
				}
			} 
			//next video
			$next_id = $id + 1;
			$field = max(tb_video_id);
			$maxid = $model -> field($field) -> find();
			if($maxid >= $next_id) 
			{
				$data_next = $model -> field($field) -> alias($alias) -> join($join) -> find($next_id);
				if($data_next) 
				{
					$this -> assign('data_next', $data_next);
				}
			} 
		}
		$this -> display();
	}
}