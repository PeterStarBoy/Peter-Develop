<?php
namespace Home\Controller;
use Think\Controller;
class VideouserController extends Controller 
{
	/**
	* USAGE: modify vip info
	*/
	public function modvip() 
	{
		if(IS_POST) 
		{
			$model = M('Video_user');
			$model -> create();
			$result = $model -> save();
			if($result) 
			{
				echo "<script>alert('资料修改成功！'); window.close();</script>";
			}
		} 
		else 
		{
			$id = I('get.id');
			$model = M('Video_user');
			$data = $model -> find($id);
			//dump($data);die;
			if($data) 
			{
				$this -> assign('data', $data);
			}

			$this -> display();
		}
	}
}