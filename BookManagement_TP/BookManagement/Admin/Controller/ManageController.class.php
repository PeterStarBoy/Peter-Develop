<?php
namespace Admin\Controller;
//extends CommonController;
class ManageController extends CommonController 
{
	/**
	* TODO: show manager.html page
	*/
	public function index() 
	{
		$this -> display();
	}
	/**
	* TODO: show all manager's rights
	*/
	public function showRights() 
	{
		//get all manager's information, id, name, rights etc...
		$model = M('Manager');
		//page split start
		$count = $model -> count();
		$page = new \Think\Page($count, 2);
		$page -> rollPage = 1;
		$page -> lastSuffix = false;
		$page -> setConfig('prev', '上一页');
		$page -> setConfig('next', '下一页');
		$page -> setConfig('last', '尾页');
		$page -> setConfig('first', '首页');
		$show = $page -> show();
		//original sql 
		//select m.id, m.name, p.sysset, p.readerset, p.bookset, p.borrowback, p.sysquery from tb_manager m left join tb_purview p on m.id = p.id;
		$data = $model -> field("m.id, m.name, p.sysset, p.readerset, p.bookset, p.borrowback, p.sysquery") -> alias('m') -> join('left join tb_purview p on m.id = p.id') -> limit($page -> firstRow, $page -> listRows) -> select();
		//pass over $data to tmpl
		$this -> assign('show', $show);
		$this -> assign('data', $data);
		$this -> display();
	}

	/**
	* TODO: add new manager
	* 
	*/

	public function addManager() 
	{
		$this -> display();
		//get the user data
		$data = I('post.');
		//instance model
		$model = M('Manager');
		//insert data and check the result
		$res = $model -> add($data);
		if($res) 
		{
			$this -> success('管理员添加成功！，请设置相应权限！', U("modify", array('id' => "$res")), 3);
		} 
	}

	/**
	* TODO: set authorization
	*/
	public function modify() 
	{
		//check if it's get or post request
		if(IS_POST) 
		{
			$data = I('post.');
			//dump($data);die;
			//rights check
			$rights = array('sysset' => 0, 'readerset' => 0, 'bookset' => 0, 'borrowback' => 0, 'sysquery' => 0);
			$set = array_diff_key($rights, $data);
			$ready = array_merge($data, $set);
			//instance
			$model = M('Purview');
			$res = $model -> save($ready);
			if($res) 
			{
				$this -> success('恭喜您，权限修改成功!', U('showRights'), 3);
			} 
			else 
			{
				echo "<script>window.alert('权限修改失败！'); window.close();</script>";
			}
		}
		else 
		{
			//get the id from addManager and show all the rights
			$id = I('get.id');
			//original sql
			//select m.id, m.name, p.sysset, p.readerset, p.borrowback, p.bookset, p.sysquery from tb_manager m left join tb_purview p on m.id = p.id where m.id = $id;
			//instance model
			$model = M('Manager');
			$data = $model -> field("m.id, m.name, p.*") -> alias('m') -> join("left join tb_purview p on m.id = p.id") -> where("m.id = $id") -> find();
			// add id to data
			$data['id'] = $id;
			$this -> assign('data', $data);
			$this -> display();
		}
	}

	/**
	* TODO: delete
	*/
	public function del() 
	{
		$id = I('get.id');
		$model = M('Manager');
		$res = $model -> delete($id);
		if($res) 
		{
			//check if has rights
			$model = M('Purview');
			$ifhas = $model -> find($id);
			if($ifhas) 
			{
				$res = $model -> delete($id);
				if($res) 
				{
					$this -> success('删除成功！！', U('showRights'), 3);
				}
			} 
			else 
			{
				$this -> success('删除成功！', U('showRights'), 3);
			}
		}
	}

	/**
	* TODO: change password
	*/
	public function pwdModify() 
	{
		//split the code by request
		if(IS_POST) 
		{
			$data = I('post.');
			$model = M('Manager');
			$id = session('id');
			$result = $model -> where("id = $id") -> save($data);
			if($result) 
			{
				$this -> success('密码修改成功！', U('showRights'), 3);
			} 
			else 
			{
				$this -> error('密码修改失败！');
			}
		} 
		else 
		{
			//$data = session('name');
			$model = M('Manager');
			$data = $model -> find(session('id'));
			$this -> assign('data', $data);
			$this -> display();
		}
	}

	/**
	* USAGE: check if manager exists
	*/
	public function ifexists() 
	{
		$name = I('get.name');
		if($name) 
		{
			$model = M('Manager');
			$where = "name = '$name'";
			$result = $model -> where($where) -> find();
			if($result) 
			{
				echo "名字已存在！";
			}
		}
	}
}