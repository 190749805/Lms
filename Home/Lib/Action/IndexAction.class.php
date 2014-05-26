<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$this->display();
	}
	//验证用户
	public function login(){
		$user=M('User');
		$data['username']=$_POST['username'];
		$data['password']=md5($_POST['password']);
		$data['status']=$_POST['status'];
	    $arr=$user->where($data)->select();
		//exit;
		//va$user->where($data)->select());
		if($arr>0){
			$_SESSION['username']=$data['username'];
			$_SESSION['id']=$arr[0]['id'];
			$_SESSION['name']=$arr[0]['name'];
			$_SESSION['status']=$arr[0]['status'];
			$this->ajaxReturn($arr);
		}else{
			$this->ajaxReturn();
		}
	}

}