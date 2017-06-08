<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller 
{
	/**
	* USAGE: check login
	*/
	public function checkLogin() 
	{
		$username = trim(I('post.name'));
		$password = trim(I('post.password'));
		if (!empty($username) && !empty($password)) 
		{
			$model = M('Video_user');
			$where = ('1 = 1');
			$where .= (" and tb_video_user = '$username'");
			$result = $model -> where($where) -> find();
			if($result) 
			{
				$where .= (" and tb_video_pass = '$password'");
				$resultAgain = $model -> where($where) -> find();
				if($resultAgain) 
				{
					session('id', $resultAgain['tb_user_id']);
					session('name', $resultAgain['tb_video_user']);
					$this -> display('Index/index');
				} 
				else 
				{
					$this -> error('您输入的密码有误，请重新输入！');
				}
			} 
			else 
			{
				$this -> error('您输入的账户不存在！');
			}
		}
	}

	/**
	* USAGE: logout 0 ^ 0
	*/
	public function logout() 
	{
		session(null);
		$this -> display('Index/index');
	}
	
	/**
	* USAGE: register
	*/
	public function register() 
	{
		if (IS_POST) 
		{
			$data = I('post.');
			//trim the blankspace
			foreach($data as $key => $value) 
			{
				$data[$key] = trim($value);
			}
			//dump($data);die;
			//instance model
			$model = M('Video_user');
			$result = $model -> add($data);
			if($result) 
			{
				echo "<script>alert('恭喜您注册成功！'); window.close(); </script>";
			} 
			else 
			{
				echo "<script>alert('抱歉，注册失败！请重新尝试！'); </script>";
			}
		} 
		else 
		{
			$this -> display('Register/register');
		}
	}
}
