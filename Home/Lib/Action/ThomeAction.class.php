<?php
class ThomeAction extends Action{
	public function _before_index(){
		if($_SESSION['status']!=1){
			$this->display('Index/index');
		}else{
			$this->display();
		}
	}
	public function index(){
		//$this->display();
	}
	//显示学生管理界面
	public function student(){
		$this->display();
	}
	//添加学生
	public function add_student(){
		$user=M('User');
		//$arry=$_POST;
		//dump($arry);
		$data['class']=$_POST['class'];
		$data['specialty']=$_POST['specialty'];
		$data['username']=$_POST['username'];
		$data['name']=$_POST['name'];
		$data['password']=md5($_POST['username']);
		$arry=$user->where('username='.$data['username'])->select();
		if($arry>0){
			echo '2';
		}else{
			$arr=$user->add($data);
			if($arr>0){
				echo '1';
			}else{
				echo '0';
			}
		}
	}
	//查询所有学生
	public function select_student(){
		$user=M('User');
		$page_number=10;
		$start=$page_number*($_POST['page']-1);
		$count=$user->where('status=0')->count();
		$arr=$user->where('status=0')->limit($start,$page_number)->select();
		if($arr>0){
			if($count%$page_number==0){
				$num=floor($count/$page_number);
			}else{
				$num=floor($count/$page_number)+1;
			}
			$arry[0]=$arr;
			$arry[1]=$num;
			echo json_encode($arry);
		}else{
			$arry[0]="";
			echo json_encode($arry);
		}
	}
	//删除学生
	public function remove_student(){
		$id=$_POST['id'];
		$user=M('User');
		$arr=$user->join('file on user.id=file.fid')->where('id='.$id)->delete();
		if($arr>0){
			echo '1';
		}else{
			echo '0';
		}
	}
}