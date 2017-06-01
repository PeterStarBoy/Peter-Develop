<?php
namespace Admin\Controller;
class ReadertypeController extends CommonController 
{
	/**
	* USAGE: show all readertypes
	*/
	public function index() 
	{
		$model = M('Readertype');
		$count = $model -> count();
		$page = new \Think\Page($count, 3);
		$page -> rollPage = 1;
		$page -> lastSuffix = false;
		$page -> setConfig('prev', '上一页');
		$page -> setConfig('next', '下一页');
		$page -> setConfig('last', '尾页');
		$page -> setConfig('first', '首页');
		$show = $page -> show();
		if($count)
		{
			$types = $model -> limit($page -> firstRow, $page -> listRows) -> select();
			$this -> assign('show', $show);
			$this -> assign('types', $types);
		}
		$this -> display();
	}

	/**
	* USAGE: delete readertype
	*/
	public function typeDel() 
	{
		$id = I('get.id');
		$result = M('Readertype') -> delete($id);
		if($result) 
		{
			$this -> success('读者类型删除成功！', U('index'), 3);
		} 
		else 
		{
			$this -> error('读者类型删除失败');
		}
	}

	/**
	* USAGE: add readertype
	*/
	public function typeAdd() 
	{
		if(IS_POST) 
		{
			$model = M('Readertype');
			$model -> create();
			$result = $model -> add();
			if($result) 
			{
				$this -> success('类型添加成功！', U('index'), 3);
			} 
			else 
			{
				$this -> error('类型添加失败！');
			}
		}
		$this -> display();
	}

	/**
	* USAGE: check if type exists
	*/
	public function ifexists() 
	{
		$name = I('get.name');
		if($name) 
		{
			$model = M('Readertype');
			$where = "name = '$name'";
			$result = $model -> where($where) -> find();
			if($result) 
			{
				echo "该类型已经存在！";
			}
		}
	}
}