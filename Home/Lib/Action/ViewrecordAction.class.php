<?php
class ViewrecordAction extends Action{
	public function index(){
		$this->paging();
	}
	//查询自己的发表记录
	public function select_file(){
		if($_SESSION['username']=='' || $_SESSION['id']=='' || $_SESSION['name']==''){
			echo json_encode('亲，你还没有登录');
		}else{
			$impression=M('File');
			$id=$_SESSION['id'];
			$arr=$impression->join('user on file.fid=user.id')->where("user.id=".$id)->select();
			if($arr>0){
				//echo json_encode($arr);
				$this->assign('list',$list);
				$this->assign('page',$page);
				$this->display();
				echo json_encode($arr);
			}else{
				echo json_encode('亲，你还没有发表任何内容哟');
			}
		}
		//$this->display();
	}
	//分页显示
	 public function paging(){
		if($_SESSION['username'] !='' && $_SESSION['id'] !='' && $_SESSION['name'] !=''){
			import("ORG.Util.Page");// 导入分页类
			$impression = D("File");
			$id=$_SESSION['id'];
			$count = $impression->where('fid='.$id)->count();// 查诟满足要求的总记录数
			$page = new Page($count,8);
			$show = $page->show();
			$list = $impression->field('user.id as uid,user.name,file.filetime,file.filename,user.username,file.impression,file.id,file.number')
			->join('user on file.fid=user.id')->relation(true)->where('fid='.$id)->order('file.id desc')->limit($page->firstRow.','.$page->listRows)->select();
			//$data['cid']=($list[0]['id']);
			$arr=array();
			for($i=0;$i<count($list);$i++){
				$arr[$i]['filetime']=date('Y-m-d H:i:s', $list[$i]['filetime']);
				$arr[$i]['uid']=$list[$i]['uid'];
				$arr[$i]['name']=$list[$i]['name'];
				$arr[$i]['filename']=$list[$i]['filename'];
				$arr[$i]['username']=$list[$i]['username'];
				$arr[$i]['impression']=$list[$i]['impression'];
				$arr[$i]['id']=$list[$i]['id'];
				$arr[$i]['number']=$list[$i]['number'];
				$arr[$i]['comment']=$list[$i]['comment'];
			}
			$this->assign('list',$arr);
			$this->assign('page',$show);
			$this->display('Viewrecord:index');
		}
	} 
	//删除记录
	public function remove(){
		$id=$_GET['id'];
		$file=M('File');
		$arr=$file->join('comment on file.id=comment.cid')->join('praise on file.id=praise.pid')->where('id='.$id)->delete();
	
		if($arr){
			//echo json_encode('删除成功');
			$this->success('删除成功',U('Viewrecord:index'));
		}else{
			//echo json_encode('删除失败!');
			//var_dump('fsdaf');
			$this->error('删除失败');
			
		}
		
		
	}
	//根据id查找相应的记录并显示出来目的用来修改
	public function select_impression(){
		$id=$_GET['id'];
		//$id=16;
		$impression=M('File');
		$content=$impression->where('id='.$id)->select();
		if($content){
			$this->assign('content',$content[0]['impression']);
			$this->assign('id',$content[0]['id']);
			$this->display();
		}else{
			$this->error('查询失败');
		}
	}
	//修改记录
	public function update(){
		$imp=M('File');
		$data['id']=$_POST['id'];
		$data['impression']=$_POST['impression'];
		$arr=$imp->save($data);
		if($arr>0){
			echo '1';
		}else{
			echo '0';
		}
	}
	//储存评论
	public function comment(){
		if($_SESSION['username']!=""){
			$comment=M('Comment');
			$user=M('User');
			$id=$_SESSION['id'];
			$data1['name']=$user->where('id='.$id)->getField('name');
			if($data1['name']){
				$data1['cid']=$_POST['id'];
				$data['content']=$_POST['content'];
				//$data1['cid']=19;
				//$data['content']='fdsfd';
				$arr1=$comment->where($data1)->select();
				if($arr1>0){
					echo json_encode();
				}else{
					$data['name']=$data1['name'];
					$data['cid']=$data1['cid'];
					$arr=$comment->add($data);
					if($arr>0){
						echo json_encode($data);
						
					}else{
						echo json_encode();
					}
				}
			}else{
				echo '0';
			}
		}else{
			echo '0';
		}
		
		//$this->display();
	}
	//存储被评论的内容的赞
	public function praise(){
		if($_SESSION['username']!=""){
			$id=$_POST['id'];
			//$id=19;
			$praise=M('Praise');
			$data['pid']=$id;
			$pname=$_SESSION['name'];
			$arr=$praise->field('praise.pname')->where('pid='.$id)->select();
			//$i=$praise->where('pid='.$id)->count();
			$i=false;
			foreach($arr as $arry){
				if($pname==$arry['pname']){
					$i=true;
				}
			}
			//echo $i;
			if($i){
				echo '0';
			}else{
				$file=M('File');
				$number=$file->where('id='.$id)->getField('number');
				$data1['number']=($number+1);
				$data1['id']=$id;
				//dump($data1['number']);
				$arr1=$file->where('id='.$id)->save($data1);
				//$this->display();
				$data['pname']=$pname;
				$arr2=$praise->add($data);
				if($arr1 && $arr2){
					echo json_encode($data1['number']);
				}else{
					echo '-1';
				}
			}
		}else{
			echo '-1';
		}	
	}
	//文件下载
	public function download(){
		if($_SESSION['username']!=""){
			$file=M('File');
			$id=$_GET['id'];
			$arr=$file->find($id);
			$filename = $arr['filepath'].$arr['savename'];//测试使用的绝对路径，exe的目录所在
			//$file = $this->f_write();
			if(file_exists($filename)) {//判断相应目录文件下的目标exe是否存在，并进行下载
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.$arr['filename']);//下载后的文件名
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				header('Content-Length: ' . filesize($filename));
				ob_clean();
				flush();
				readfile($filename);
				exit;
			}else{//相应的资源不存在
				$this->error('下载失败');
			}
		}else{
			$this->error('亲，你还没有登录');
		}
	}

	
}