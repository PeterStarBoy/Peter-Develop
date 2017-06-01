<?php
namespace Admin\Controller;
use Think\Controller;
/**
* TODO: setup the middle controller to avoid unauthorized visit
* 
*/
class CommonController extends Controller 
{
	//can also use parent::__construct() then __contruct instead
	public function _initialize() 
	{
		$name = session('name');
		if(empty($name)) 
		{
			//redirect to login page
			$this -> error('对不起，您无权操作，请登陆后再进行访问!', U('Public/login'), 3);
		}
	}
}