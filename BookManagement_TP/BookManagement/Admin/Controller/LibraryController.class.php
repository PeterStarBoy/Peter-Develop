<?php
namespace Admin\Controller;
class LibraryController extends CommonController 
{
	/**
	* USAGE: modify library info
	*/
	public function libraryModify() 
	{
		$model = M('Library');
		if(IS_POST) 
		{
			$data = I('post.');
			//dump($data);die;
			$model -> create();
			$result = $model -> save();
			if($result) 
			{
				$this -> success('图书馆信息保存成功！', U('libraryModify'), 3);
			} 
			else 
			{
				$this -> error('图书馆信息保存失败！');
			}
		} 
		else 
		{
			$libinfo = $model -> select();
			//dump($libinfo);die;
			if($libinfo) 
			{
				$this -> assign('libinfo', $libinfo);
			}
			$this -> display();
		}
	}
}