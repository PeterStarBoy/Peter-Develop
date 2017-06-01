<?php
namespace Admin\Controller;
class QueryController extends CommonController 
{
	/**
	* USAGE: bookinfo query
	*/
	public function bookQuery() 
	{
		//logical tree
		/*show options in the select box
		  show pages  ->  user activity
		  get the type and typevalue
		  mysql select
		  show dates
		 */
			$data = I('post.');
			$data['value'] = isset($data['value']) ? trim($data['value']) : '';
			$model = M('Bookinfo');
			if(IS_POST) 
			{
				//see if the value is empty.
				if(empty($data['value'])) 
				{
					//original sql sentence
					//select t1.barcode, t1.bookname, t2.typename, t3.pubname, t4.name from tb_bookinfo t1 join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id order by $data['field'];
					$book = $model -> field("t1.barcode, t1.bookname, t2.typename, t3.pubname, t4.name") -> alias("t1") -> join("join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id") -> order("{$data['field']}") -> select();
				} 
				else 
				{
					//field is not empty
					//original sql
					//select t1.barcode, t1.bookname, t2.typename, t3.pubname, t4.name from tb_bookinfo t1 join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id where {$data['field']} like "%{$data['value']}%" order by $data['field'];
					$book = $model -> field("t1.barcode, t1.bookname, t2.typename, t3.pubname, t4.name") -> alias("t1") -> join("join tb_booktype t2 on t1.typeid = t2.id join tb_publishing t3 on t1.ISBN = t3.ISBN join tb_bookcase t4 on t1.bookcase = t4.id") -> where("{$data['field']} like '%{$data['value']}%'") -> select();
				}
				if($book) 
				{
					$this -> assign('book', $book);
				} 
				else 
				{
					echo "<script>window.alert('没有找到你需要的结果！'); </script>";
				}
			}
		$this -> display();
	}

	/**
	* USAGE: search borrow info
	*/
	public function borrowQuery() 
	{
		if(IS_POST) 
		{
			$data = I('post.');
			$model = M('Borrow');
			//page split
			$count = $model -> count();
			$page = new \Think\Page($count, 8);
			$page -> rollPage = 1;
			$page -> lastSuffix = false;
			$page -> setConfig('prev', '上一页');
			$page -> setConfig('next', '下一页');
			$page -> setConfig('last', '尾页');
			$page -> setConfig('first', '首页');
			$show = $page -> show();
			//trim data
			$data['value'] = isset($data['value']) ? trim($data['value']) : '';
			$data['sdate'] = isset($data['sdate']) ? trim($data['sdate']) : '';
			$data['edate'] = isset($data['edate']) ? trim($data['edate']) : '';
			//check flagone
			if($data['flagone'] == 'field' && !isset($data['flagtwo'])) 
			{
				//original sql sentence
				//select t1.barcode, t1.bookname, t2.barcode, t2.name, t3.borrowTime, t3.backTime, t3.ifback from tb_borrow t3 join tb_reader t2 on t3.readerid = t2.id join tb_bookinfo t1 on t3.bookid = t1.id where {$data['key']} like '%{$data['value']}%' and t3.ifback = 0; 
				$book = $model -> field("t1.barcode as bookbarcode, t1.bookname, t2.barcode, t2.name, t3.borrowTime, t3.backTime, t3.ifback") -> alias('t3') -> join("join tb_reader t2 on t3.readerid = t2.id join tb_bookinfo t1 on t3.bookid = t1.id") -> where("{$data['key']} like '%{$data['value']}%'") -> limit($page -> firstRow, $page -> listRows) -> select();
				//dump($book);die;
			} 
			elseif ($data['flagtwo'] == 'data' && !isset($data['flagone']))
			{
				//get the result
				$book = $model -> field("t1.barcode as bookbarcode, t1.bookname, t2.barcode, t2.name, t3.borrowTime, t3.backTime, t3.ifback") -> alias('t3') -> join("join tb_reader t2 on t3.readerid = t2.id join tb_bookinfo t1 on t3.bookid = t1.id") -> where("t3.borrowTime BETWEEN '{$data['sdate']}' AND '{$data['edate']}'") -> select();
				//dump($book);die;
			} 
			elseif($data['flagone'] == 'field' && $data['flagtwo'] == 'data') 
			{
				//sql
				$book = $model -> field("t1.barcode as bookbarcode, t1.bookname, t2.barcode, t2.name, t3.borrowTime, t3.backTime, t3.ifback") -> alias('t3') -> join("join tb_reader t2 on t3.readerid = t2.id join tb_bookinfo t1 on t3.bookid = t1.id") -> where("t3.borrowTime BETWEEN '{$data['sdate']}' AND '{$data['edate']}' AND {$data['key']} like '%{$data['value']}%'") -> select();
			}
			//pass over book info
			if($book) 
			{
				$this -> assign('show', $show);
				$this -> assign('book', $book);
			} 
			else 
			{
				echo "<script>window.alert('您所查询的数据不存在！，请重新操作！');</script>";
			}
		} 
		$this -> display();
	}

	/**
	* USAGE: search if reach the book's deadline
	*/
	public function bremind() 
	{
		$model = M('Bookinfo');
		$checkdate = date("Y-m-d");
		//original sql
		//select t1.barcode as bookbarcode, t1.bookname, t2.barcode, t2.name, t3.borrowTime, t3.backTime from tb_bookinfo t1 join tb_borrow t3 on t1.id = t3.bookid join tb_reader t2 on t2.id = t3.readerid where t3.backTime <= {$checkdate} and t3.ifback = 0;
		$book = $model -> field("t1.barcode as bookbarcode, t1.bookname, t2.barcode, t2.name, t3.borrowTime, t3.backTime") -> alias('t1') -> join("join tb_borrow t3 on t1.id = t3.bookid join tb_reader t2 on t2.id = t3.readerid") -> where("t3.backTime <= '{$checkdate}' and t3.ifback = 0") -> select();
		//dump($book);die;
		if($book) 
		{
			$this -> assign('book', $book);
		} 
		else 
		{
			echo "<script>window.alert('没有未归还的超期图书！！');history.back();</script>";
		}
		$this -> display();
	}
}