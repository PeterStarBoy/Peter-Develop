<?php
namespace Admin\Controller;
class BookcaseController extends CommonController 
{
	/**
	* USAGE: show bookcase info
	*/
	public function index() 
	{
		$model = M('Bookcase');
		$count = $model -> count();
		if($count) 
		{
			$page = new \Think\Page($count, 4);
			$page -> rollPage = 1;
			$page -> lastSuffix = false;
			$page -> setConfig('prev', '上一页');
			$page -> setConfig('next', '下一页');
			$page -> setConfig('last', '尾页');
			$page -> setConfig('first', '首页');
			$show = $page -> show();
			$case = $model -> limit($page -> firstRow, $page -> listRows) -> select();
		}
		if($case) 
		{
			$this -> assign('show', $show);
			$this -> assign('case', $case);
		}
		$this -> display();
	}

	/**
	* USAGE: add bookcase
	*/
	public function caseAdd() 
	{
		if(IS_POST) 
		{
			$model = M('Bookcase');
			$model -> create();
			$result = $model -> add();
			if($result) 
			{
				$this -> success('添加书架成功！', U('index'), 3);
			} 
			else 
			{
				$this -> error('添加书架失败！');
			}
		}
		$this -> display();
	}

	/**
	* USAGE: delete bookcase
	*/
	public function caseDel() 
	{
		$id = I('get.id');
		$model = M('Bookcase');
		$result = $model -> delete($id);
		if($result) 
		{
			$this -> success('删除书架成功！', U('index'), 3);
		} 
		else 
		{
			$this -> error('删除书架失败！');
		}
	}

	/**
	* USAGE: check if bookcase exists
	*/
	public function ifexists() 
	{
		$case = trim(I('get.bookcase'));
		if($case) 
		{
			$model = M('Bookcase');
			$where = "name = '$case'";
			$result = $model -> where($where) -> find();
			if($result) 
			{
				echo "该书架已经存在！";
			} 
		}
	}
}