<?php
namespace Admin\Controller;
class ReaderController extends CommonController 
{
	/**
	* USAGE: show reade main page
	*/
	public function index() 
	{
		$model = M('Reader');
		$count = $model -> count();
		if($count) 
		{
			$page = new \Think\Page($count, 5);
			$page -> rollPage = 1;
			$page -> lastSuffix = false;
			$page -> setConfig('prev', '上一页');
			$page -> setConfig('next', '下一页');
			$page -> setConfig('last', '尾页');
			$page -> setConfig('first', '首页');
			$show = $page -> show();
			//original sql
			//select t1.id, t1.barcode, t1.name, t1.paperType, t1.paperNO, t1.tel, t1.email, t2.name as typename from tb_reader t1 join tb_readertype t2 on t1.typeid = t2.id;
			$reader = $model -> field("t1.id, t1.barcode, t1.name, t1.paperType, t1.paperNO, t1.tel, t1.email, t2.name as typename") -> alias("t1") -> join("join tb_readertype t2 on t1.typeid = t2.id") -> limit($page -> firstRow, $page -> listRows) -> select();
			if($reader) 
			{
				$this -> assign('show', $show);
				$this -> assign('reader', $reader);
			}
		}
		$this -> display();
	}

	/**
	* USAGE: delete reader info
	*/
	public function readerDel() 
	{
		$model = M('Reader');
		$id = I('get.id');
		$result = $model -> delete($id);
		if($result) 
		{	
			echo "<script>window.alert('删除成功！'); history.back(); </script>";
		} 
		else 
		{
			echo "<script>window.alert('删除失败！'); history.back()</script>";
		}
	}

	/**
	* USAGE: modify reader info
	*/
	public function readerModify() 
	{
		if(IS_POST) 
		{
			$data = I('post.');
			//dump($data);die;
			$model = M('Reader');
			$model -> create();
			$model -> id = $data['id'];
			$result = $model -> save();
			if($result) 
			{
				$this -> success('数据修改成功！！', U('index'), 3);
			} 
			else 
			{
				$this -> error('数据修改失败！');
			}
		}
		else 
		{
			$id = I('get.id');
			$model = M('Reader');
			$info = $model -> where("id = $id") -> find();
			if($info) 
			{
				$this -> assign('info', $info);
			}
			$type = M('Readertype');
			$typeinfo = $type -> select();
			$this -> assign('typeinfo', $typeinfo);
			$this -> display();
		}
	}

	/**
	* USAGE: show certain reader info
	*/
	public function readerInfo() 
	{
		$id = I('get.id');
		$model = M('Reader');
		//original sql
		//select t1.*, t2.name as typename from tb_reader t1 join tb_readertype t2 on t1.typeid = t2.id where t1.id = $id;
		$info = $model -> field("t1.*, t2.name as typename") -> alias("t1") -> join("join tb_readertype t2 on t1.typeid = t2.id") -> where("t1.id = $id") -> find();
		if($info) 
		{
			$this -> assign('info', $info);
		}
		$this -> display();
	}
}