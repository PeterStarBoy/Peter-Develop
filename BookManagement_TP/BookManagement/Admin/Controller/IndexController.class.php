<?php
namespace Admin\Controller;
class IndexController extends CommonController 
{
	//show mainpage
	public function index() 
	{
		//show bookinfo
		//original sql
		//select t1.barcode, t1.bookname, t1.author, t1.price, t2.typename, t3.name, t4.pubname, count(t5.bookid) as times from tb_bookinfo t1 join tb_booktype t2 on t1.typeid = t2.id join tb_bookcase t3 on t1.bookcase = t3.id join tb_publishing t4 on t1.ISBN = t4.ISBN join tb_borrow t5 on t1.id = t5.bookid group by t5.bookid order by times desc;
		$model = M('Bookinfo');
		$count = $model -> count();
		if($count) 
		{
			//start page split
			$page = new \Think\Page($count, 2);
			//set pagesplit config
			$page -> rollPage = 1;
			$page -> lastSuffix = false;
			$page -> setConfig('prev', '上一页');
			$page -> setConfig('next', '下一页');
			$page -> setConfig('last', '尾页');
			$page -> setConfig('first', '首页');
			//get pagesplit url
			$show = $page -> show();
			//get the info need to be display
			$book = $model -> field("t1.barcode, t1.bookname, t1.author, t1.price, t2.typename, t3.name, t4.pubname, count(t5.bookid) as times") -> alias('t1') -> join("join tb_booktype t2 on t1.typeid = t2.id join tb_bookcase t3 on t1.bookcase = t3.id join tb_publishing t4 on t1.ISBN = t4.ISBN join tb_borrow t5 on t1.id = t5.bookid") -> group("t5.bookid") -> order('times desc') -> limit($page -> firstRow, $page -> listRows) -> select();
			if($book) 
			{
				//pass over to tmpl
				$this -> assign('show', $show);
				$this -> assign('book', $book);
			}
		}
		$this -> display();
	}
}
