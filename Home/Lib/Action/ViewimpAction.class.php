<?php
class ViewimpAction extends Action{
	//��ʾ���˲�ѯ��¼
	public function index(){
		$this->display();
	}
	//����ʱ��ĺ���
	public function ptime($list){
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
		return $arr;
	}
	//��������������ѯ
	public function day(){
		import("ORG.Util.Date");
		$time=new Date();
		$id=$_POST['id'];
		//$id='yd';
		$number_per_page=8 ;
		$start=$number_per_page*($_POST['page']-1);
		$file=D('File');
		switch($id){   //һ���ڲ�ѯ
		case 'td':
			$time1=date('Y-m-d H:i:s',strtotime("-1 day"));
			$data['filetime']=array('gt',strtotime($time1));
		break;		//�����ڲ�ѯ
		case 'yd':
			//dump('fsd');
			$time1=date('Y-m-d H:i:s',strtotime("-2 day"));
			$data['filetime']=array('gt',strtotime($time1));
		break;	
		case 'fd':   //�����ڲ�ѯ
			$time1=date('Y-m-d H:i:s',strtotime("-3 day"));
			$data['filetime']=array('gt',strtotime($time1));
		break;
		case 'dd':   //���������ѯ
			$time1=date('Y-m-d H:i:s',strtotime("-3 day"));
			$data['filetime']=array('lt',strtotime($time1));
		break;
		case 'ow':   //һ���ڲ�ѯ
			$time1=date('Y-m-d H:i:s',strtotime("-7 day"));
			$data['filetime']=array('gt',strtotime($time1));
		break;
		case 'tw':    //�����ڲ�ѯ
			$time1=date('Y-m-d H:i:s',strtotime("-14 day"));
			$data['filetime']=array('gt',strtotime($time1));
		break;
		case 'thw':    //�����ڲ�ѯ
			$time1=date('Y-m-d H:i:s',strtotime("-21 day"));
			$data['filetime']=array('gt',strtotime($time1));
		break;
		case 'ww':    //�������ѯ
			$time1=date('Y-m-d H:i:s',strtotime("-21 day"));
			$data['filetime']=array('lt',strtotime($time1));
		break;
		case 'php':
			$data['specialty']=array('like','%php%');
		break;
		case 'java':
			$data['specialty']=array('like','%java%');
		break;
		case 'android':
			$data['specialty']=array('like','%��׿%');
		break;
		case 'net':
			$data['specialty']=array('like','%Ƕ��ʽ%');
		break;
		case 'clipart':
			$data['specialty']=array('like','%����%');
		break;
		case 'embedded':
			$data['specialty']=array('like','%.net%');
		break;
		case 'ccc':
			$data['specialty']=array('like','%c++%');
		break;
		case 'other':
			$data['specialty']=array('notlike',array('%php%','%java%','%��׿%','%Ƕ��ʽ%','%����%','%.net%','%c++%'),'and');
		break;
		default:
			$data="";
		}
		$num = $file->field('user.id as uid,user.name,file.filetime,file.filename,user.username,file.impression,file.id,file.number')
		->join('user on file.fid=user.id')->where($data)->relation(true)->order('file.id desc')->count();
		$list = $file->field('user.id as uid,user.name,file.filetime,file.filename,user.username,file.impression,file.id,file.number')
		->join('user on file.fid=user.id')->where($data)->relation(true)->order('file.id desc')->limit($start,$number_per_page)->select();
		$arr=$this->ptime($list);
		//var_dump($list);
		//die;
		$arry=array();
		$arry[0]=$arr;
		if($num%$number_per_page==0){
			$arry[1]=floor($num/$number_per_page);
		}else{
			$arry[1]=floor($num/$number_per_page)+1;
		}
		//dump($arr);
		echo json_encode($arry);
	}
	
}