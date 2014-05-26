<?php
// 本类由系统自动生成，仅供测试用途
class HomeAction extends Action {
    public function index(){
		$this->display();
	}
		
	//查询用户的资料
	public function select_user(){
		$user=M('User');
		$username['username']=$_SESSION['username'];
		$arr=$user->where($username)->select();
		//var_dump($username);
		//exit; */
		if($arr>0){
			echo json_encode($arr);
		}else{
			echo json_encode('0');
		}
		//$this->display();
	}
	//修改资料
	public function update_prifile(){
		if($_SESSION['status']!=1){
			$user=M('User');
			$arr['username']=$_SESSION['username'];
			//$data['name']=$_POST['name'];
			$data['class']=$_POST['class'];
			$data['specialty']=$_POST['specialty'];
			$arr=$user->where($arr)->save($data);
			if($arr>0){
				echo json_encode($arr);
			}else{
				echo json_encode();
			}
		}else{
			echo json_encode();
		}
	}
	//修改密码
	public function change_password(){
		$data1['repassword']=md5($_POST['repassword']);	//确认密码
		$data1['newpassword']=md5($_POST['newpassword']);		//新密码
		$data['username']=$_SESSION['username'];
		$data['password']=md5($_POST['oldpassword']); 	//原密码
		//$repassword='1234567';
		//$newpassword='1234567';
		//$data['password']=md5('2011081156'); 
		$user=M('User');
		$m=$user->where($data)->select();
		//var_dump($m);
		if($m>0){
			if($data1['repassword'] != $data1['newpassword']){
				echo json_encode('确认密码不正确');
			}else{
				//$password=M('User');
				$data2['id']=$m[0]['id'];
				$data2['password']=$data1['repassword'];
				$arr=$user->save($data2);
				if($arr>0){
					echo json_encode('修改成功');
				}else{
					//var_dump($m);
					//echo '<pre>';
					//print_r($m);
					echo json_encode();
				}
			}
		}else{
			echo json_encode('你输入的原密码不正确');
		}
	}
	//注销用户
	public function cancel(){
		unset($_SESSION['username']);
		unset($_SESSION['id']);
		unset($_SESSION['name']);
		unset($_SESSION['status']);
		if($_SESSION['username']=='' && $_SESSION['id']=='' && $_SESSION['name']=='' && $_SESSION['status']==''){
			echo json_encode('注销成功');
		}else{
			echo json_encode('注销失败');
		}
	}
	//上传文件
	public function upload(){
		if($_SESSION['username']=='' || $_SESSION['id']=='' || $_SESSION['name']=='' || $_SESSION['status']==''){
			echo json_encode('亲，你还没有登录');
		}else{
			import("ORG.Net.UploadFile");
			$upload = new UploadFile();
			 $upload->maxSize  = 3145728 ;// 设置附件上传大小
			//设置附件上传目录
			$upload->savePath ='./Public/File/'.$_SESSION['username'].'/';
			if(!$upload->upload())
			 {
				//捕获上传异常
				echo json_encode($upload->getErrorMsg());
			}else 
			{
				//取得成功上传的文件信息
				$info = $upload->getUploadFileInfo();
				$this->comment($info,$_POST['impression']);
			}
		}
	}
	//发表体会
	public function comment($info,$impression){
		//$info=$upload_info;
		import('ORG.Util.Date');
		$time=new Date();
		$file=M('File');
		$data['fid']=$_SESSION['id'];
		$data['filepath']=$info[0]['savepath'];
		$data['filename']=$info[0]['name'];
		$data['savename']=$info[0]['savename'];
		$data['filetime']=strtotime($time);
		$data['impression']=$impression;
		$arr=$file->add($data);
		if($arr>0){
			echo '1';
		}else{
			echo 0;;
		}
		
	}
	
}