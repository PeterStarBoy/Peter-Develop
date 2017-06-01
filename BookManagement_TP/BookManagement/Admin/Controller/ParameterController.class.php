<?php
namespace Admin\Controller;
class ParameterController extends CommonController 
{
	/**
	* USAGE: parameter modify
	*/
	public function parameterModify() 
	{
		$model = M('Parameter');
		if(IS_POST) 
		{
			$model -> create();
			$result = $model -> save();
			if($result) 
			{
				$this -> success('参数修改成功！', U('parameterModify'), 3);
			} 
			else 
			{
				$this -> error('参数修改失败！');
			}
		} 
		else 
		{
			$para = $model -> find();
			if($para) 
			{
				$this -> assign('para', $para);
			}
			$this -> display();
		}
	}
}