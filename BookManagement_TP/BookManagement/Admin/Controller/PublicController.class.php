<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller 
{
    public function login()
	{
		$this -> display();
    }

	public function checkLogin() 
	{
		//get the data inputed
		$username = I('post.username');
		$password = I('post.password');
		//instance the model, dont's forget to craete the model class in the Model file and it's better to add a captcha verification.
		$model = M('Manager');
		//check row and get rights
		$result = $model -> field('t1.id, t1.name, t2.id, t2.sysset, t2.readerset, t2.bookset, t2.borrowback, t2.sysquery') -> alias('t1') -> join('left join tb_purview as t2 on t1.id = t2.id') -> where("name = '{$username}' and pwd = '{$password}'") -> find();
		if($result) 
		{
			//store name info to session
			session('id', $result['id']);
			session('name', $username);
			session('sysset', $result['sysset']);
			session('readerset', $result['readerset']);
			session('bookset', $result['bookset']);
			session('borrowback', $result['borrowback']);
			session('sysquery', $result['sysquery']);
			$this -> success('恭喜您登录成功！', U('Index/index'), 3);
		} 
		else 
		{
			$this -> error('账户或密码错误！请重新输入!!!', U('login'), 3);
		}
		
	}

	public function logout() 
	{
		session(null);
		$this -> display('Public/login');
	}

}