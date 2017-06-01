<?php
namespace Admin\Controller;
//borrow controller
class BorrowController extends CommonController 
{
	public function bookBorrow() //need fixing
	{
		if(IS_POST) 
		{
		$readbar = I('post.');
		$model = M('Reader');
		//original sql
		//select t1.*, t2.name, t2.number,  from tb_reader t1 join tb_readertype t2 on t1.typeid = t2.id where;
		$data = $model -> field("t1.*, t2.name, t2.number") -> alias("t1") -> join("join tb_readertype t2 on t1.typeid = t2.id") -> where("barcode = '{$readbar['barcode']}'") -> find();
		if($data) 
		{
		//borrowed books
		//select t1.*, t2.borrowTime, t2.backTime, t3.bookname, t3.price, t4.pubname, t5.name from tb_reader t1 join tb_borrow t2 on t1.id = t2.readerid join tb_bookinfo t3 on t2.bookid = t3.id join tb_publishing t4 on t3.ISBN = t4.ISBN join tb_bookcase t5 on t3.bookcase = t5.id where t2.readerid = 1 and t2.ifback = 0;
		$book = $model -> field("t1.*, t2.borrowTime, t2.backTime, t3.bookname, t3.price, t4.pubname, t5.name") -> alias("t1") -> join("join tb_borrow t2 on t1.id = t2.readerid join tb_bookinfo t3 on t2.bookid = t3.id join tb_publishing t4 on t3.ISBN = t4.ISBN join tb_bookcase t5 on t3.bookcase = t5.id") -> where("t2.readerid = {$data['id']} and t2.ifback = 0") -> select();
		//get the borrowed book number;
		$num = array('borrowed' => count($book));
		$this -> assign('num', $num);
		$this -> assign('book', $book);
		$this -> assign('data', $data);
		} 
		else 
		{
			echo "<script>window.alert('该用户不存在！');</script>";
		}
		$this -> display();
		//code tree: get the inputkey, if the book exists, if borrow the same book, then insert
		if(I('post.inputkey')) 
		{
			$key = I('post.key');
			$value = I('post.inputkey');
			$id = I('post.readerid');
			//see if the book exists
			$result = M('Bookinfo') -> where("$key = '$value'") -> find();
			if($result) 
			{	
				//book exists, see if borrow the same
				//original sql
				//select t1.*, t2.borrowTime, t2.backTime, t3.bookname, t3.price, t4.pubname, t5.name from tb_borrow t2 join tb_bookinfo t3 on t2.bookid = t3.id join tb_publishing t4 on t3.ISBN = t4.ISBN join tb_bookcase t5 on t3.bookcase = t5.id join tb_reader t1 on t1.id = t2.reader where readerid = "$id" and bookid = "{$result['id']}" and ifback = 0;
				$model = M('Borrow');
				$res = $model -> field("t1.*, t2.borrowTime, t2.backTime, t3.bookname, t3.price, t4.pubname, t5.name") -> alias("t2") -> join("join tb_bookinfo t3 on t2.bookid = t3.id join tb_publishing t4 on t3.ISBN = t4.ISBN join tb_bookcase t5 on t3.bookcase = t5.id join tb_reader t1 on t1.id = t2.readerid") -> where("readerid = $id and bookid = {$result['id']} and ifback = 0") -> find();
				if($res) 
				{
					echo "<script>window.alert('同样的书籍不能重复借阅！！！');</script>";
				} 
				else 
				{
					//insert
					$model -> readerid = $id;
					$model -> bookid = $result['id'];
					$model -> borrowTime = date("Y-m-d");
					$model -> backTime = date("Y-m-d", (time() + 3600 * 24 * 30));
					$model -> operator = session('name');
					$add = $model -> add();
					if($add) 
					{
						echo "<script>window.alert('图书借阅成功！'); 
							</script>";//??????????how to show current borrowed list
					}
				}
			} 
			else 
			{
				echo "<script>window.alert('该图书不存在');</script>";
			}

		}
		} 
		else 
		{
			$this -> display();
		}
	}
	
	/**
	* USAGE: to renew the book
	*/
	public function bookRenew() 
	{
		if(IS_POST) 
		{
			//show info about reader and borrowed books
			$barcode = I('post.barcode');
			//original sql
			//select t1.*, t2.borrowTime, t2.backTime, t3.name, t3.number, t4.bookname, t4.price, t5.pubname, t6.name from tb_borrow t2 join tb_reader t1 on t2.readerid = t1.id join tb_readertype t3 on t1.typeid = t3.id join tb_bookinfo t4 on t2.bookid = t4.id join tb_publishing t5 on t4.ISBN = t5.ISBN join tb_bookcase t6 on t4.bookcase = t6.id where t1.barcode = $barcode and t2.ifback = 0;
			$model = M('Borrow');
			$data = $model -> field("t1.*, t2.id as borrid, t2.borrowTime, t2.backTime, t3.name as typename, t3.number, t4.bookname, t4.price, t5.pubname, t6.name as bookcase") -> alias('t2') -> join("join tb_reader t1 on t2.readerid = t1.id join tb_readertype t3 on t1.typeid = t3.id join tb_bookinfo t4 on t2.bookid = t4.id join tb_publishing t5 on t4.ISBN = t5.ISBN join tb_bookcase t6 on t4.bookcase = t6.id") -> where("t1.barcode = '{$barcode}' and t2.ifback = 0") -> select();
			//dump($data);die;
			if($data) 
			{
				$this -> assign('data', $data);
				$this -> display();
			}
		} 
		elseif(IS_GET)
		{
			//renew
			$data = I('get.');  //barcode, borrid, backtime 2017-06-24
			if($data['borrid'] != false && $data['barcode'] != false && $data['backtime'] != false) 
			{
			//get the unix timestamp
			$timestamp = mktime(0, 0, 0, substr($data['backtime'], 5, 2), substr($data['backtime'], 8, 2), substr($data['backtime'], 0, 4));
			$newbackTime = date("Y-m-d", ($timestamp + 3600 * 24 * 30));
			//insert
			$model = M('Borrow');
			$model -> id = $data['borrid'];
			$model -> backTime = $newbackTime;
			$result = $model -> save();
			if($result) 
			{
				echo "<script>window.alert('续借成功！'); </script>";
			}
			}
			$this -> display();
		}
	}

	/**
	* USAGE: return book
	*/
	public function bookBack() 
	{
		if(IS_POST) 
		{
			//show info about reader and borrowed books
			$barcode = I('post.barcode');
			//original sql
			//select t1.*, t2.borrowTime, t2.backTime, t3.name, t3.number, t4.bookname, t4.price, t5.pubname, t6.name from tb_borrow t2 join tb_reader t1 on t2.readerid = t1.id join tb_readertype t3 on t1.typeid = t3.id join tb_bookinfo t4 on t2.bookid = t4.id join tb_publishing t5 on t4.ISBN = t5.ISBN join tb_bookcase t6 on t4.bookcase = t6.id where t1.barcode = $barcode and t2.ifback = 0;
			$model = M('Borrow');
			$data = $model -> field("t1.*, t2.id as borrid, t2.borrowTime, t2.backTime, t3.name as typename, t3.number, t4.bookname, t4.price, t5.pubname, t6.name as bookcase") -> alias('t2') -> join("join tb_reader t1 on t2.readerid = t1.id join tb_readertype t3 on t1.typeid = t3.id join tb_bookinfo t4 on t2.bookid = t4.id join tb_publishing t5 on t4.ISBN = t5.ISBN join tb_bookcase t6 on t4.bookcase = t6.id") -> where("t1.barcode = '{$barcode}' and t2.ifback = 0") -> select();
			if($data) 
			{
				$this -> assign('data', $data);
			} 
			else 
			{
				echo "<script>window.alert('您所输入的用户不存在，请重新输入！');</script>";
			}
		} 
		else 
		{
			//return
			$return = I('get.');
			$model = M('Borrow');
			$model -> id = $return['borrid'];
			$model -> ifback = 1;
			$result = $model -> save();
			if($result) 
			{
				echo "<script>window.alert('图书归还成功！');</script>";
			} 
			else 
			{
				echo "<script>window.alert('图书归还失败！');</script>";
			}
		}
		$this -> display();
	}
}