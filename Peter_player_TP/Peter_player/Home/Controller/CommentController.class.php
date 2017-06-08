<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller 
{
	/**
	* USAGE: comment processing
	*/
	public function commentProcess() 
	{
		if(IS_POST) 
		{
			$data = I('post.');
			$data['tb_discuss_date'] = date('Y-m-d H:i:s');
			$model = M('Video_discuss');
			$result = $model -> add($data);
			if($result) 
			{
				echo "<script>alert('添加评论成功！'); history.back();</script>";
			}
		}
	}
}