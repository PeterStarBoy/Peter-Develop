<?php
namespace Admin\Controller;
class BookController extends CommonController 
{
	/**
	* USAGE: show book index info
	*/
	public function index() 
	{
		//get the whole bookinfo
		$model = M('Bookinfo');
		$count = $model -> count();
		if($count) 
		{
		$page = new \Think\Page($count, 3);
		$page -> rollPage = 1;
		$page -> lastSuffix = false;
		$page -> setConfig('prev', '上一页');
		$page -> setConfig('next', '下一页');
		$page -> setConfig('last', '尾页');
		$page -> setConfig('first', '首页');
		$show = $page -> show();
		//original sql santence
		//select t1.barcode, t1.id as bookid, t1.bookname, t2.typename, t3.pubname, t4.name from tb_bookinfo t1 join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id;
		$data = $model -> field("t1.barcode, t1.id as bookid, t1.bookname, t2.typename, t3.pubname, t4.name") -> alias('t1') -> join("join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id") -> limit($page -> firstRow, $page -> listRows) -> select();
		if($data) 
		{
			$this -> assign('show', $show);
			$this -> assign('data', $data);		
		}
		}
		$this -> display();
	}
	
	/**
	* USEAGE: add new book
	*/
	public function bookAdd() 
	{
		//check if is_post
		if(IS_POST) 
		{
			$data = I('post.');
			$model = M('bookinfo');
			$result = $model -> add($data);
			if($result) 
			{
				$this -> success('添加图书成功！！', U('index'), 3);
			} 
			else 
			{
				$this -> error('添加图书失败！请重新输入！');
			}
		} 
		else 
		{
			$type = M('Booktype') -> field('id, typename') -> select();
			$case = M('Bookcase') -> field('id, name') -> select();
			$pub = M('Publishing') -> field('ISBN, pubname') -> select();
			$this -> assign('type', $type);
			$this -> assign('case', $case);
			$this -> assign('pub', $pub);
			$this -> display();
		}
	}

	/**
	* USEAGE modify book info
	*/
	public function bookModify() 
	{
		if(IS_POST) 
		{
			//$data = I('post.');
			$model = M('Bookinfo');
			$model -> create();
			$result = $model -> save();
			if($result) 
			{
				$this -> success('图书信息修改成功！', U('index'), 3);
			} 
			else 
			{
				$this -> error('图书信息修改失败！');
			}
			
		} 
		else 
		{
			$id = I('get.id');
			//make up original sql santence
			//select t1.id, t1.barcode, t1.bookname, t1.author, t1.translator, t1.price, t1.page, t2.typename, t3.pubname, t4.name from tb_bookinfo t1 join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id where id = $id;
			$data = M('Bookinfo') -> field("t1.id, t1.typeid, t1.ISBN, t1.barcode, t1.bookname, t1.author, t1.bookcase, t1.translator, t1.price, t1.page, t2.typename, t3.pubname, t4.name") -> alias('t1') -> join("join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id") -> where("t1.id = $id") -> find();
			$type = M('Booktype') -> field('id, typename') -> select();
			$case = M('Bookcase') -> field('id, name') -> select();
			$pub = M('publishing') -> field('ISBN, pubname') -> select();
			$this -> assign('type', $type);
			$this -> assign('case', $case);
			$this -> assign('pub', $pub);
			$this -> assign('data', $data);
			$this -> display();
		}
	}

	/**
	* USAGE: delete book info
	*/
	public function bookDel() 
	{
		$id = I('get.id');
		$result = M('Bookinfo') -> delete($id);
		if($result) 
		{
			$this -> success('删除成功！！', U('index'), 3);
		} 
	}

	/**
	* USAGE: show book details
	*/
	public function bookDetail() 
	{
		$id = I('get.id');
		$model = M('Bookinfo');
		//original sql
		//select t1.barcode, t1.bookname, t1.author, t1.translator, t1.price, t1.page, t2.typename, t3.pubname, t4.name from tb_bookinfo t1 join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id;
		$data = $model -> field("t1.barcode, t1.bookname, t1.author, t1.translator, t1.price, t1.page, t2.typename, t3.pubname, t4.name") -> alias('t1') -> join("join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id") -> where("t1.id = $id") -> find();
		$this -> assign('data', $data);
		$this -> display();
	}

	/**
	* USAGE: check if the book exists
	*/
	public function ifexists() 
	{
		$barcode = trim(I('get.barcode'));
		if($barcode) 
		{
			$model = M('Bookinfo');
			$where = "barcode = '$barcode'";
			$result = $model -> where($where) -> find();
			if($result) 
			{
				echo "该图书已经存在！";
			}
		}
	}
}