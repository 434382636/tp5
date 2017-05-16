<?php
namespace app\index\controller;
use think\Db;
use think\Request; 
use app\index\model\User;
class IndexController extends \think\Controller{
	public function __construct(){
        parent::__construct(); 
        if(!User::isLogin()){			
            return $this->redirect(url('Login/index'));
        }
    }
    public function index(){
		$name = Request::instance()->get('name'); 
		if(empty($name)){
			$teachers = Db::name('teacher')->paginate(2);
		}else{ 
			$teachers = Db::name('teacher')->where('name','like','%'.$name.'%')->paginate(2,false,['query'=>['name'=>$name]]);
		}
		
		$page = $teachers->render();	
		$this->assign('page',$page);
		$this->assign('teachers',$teachers);
        return $this->fetch('index');
    }
	public function add(){ 
		return $this->fetch();
	}
	public function save(){ 
		$postData = Request::instance()->post();
		$data=['name'=>$postData['name'],'username'=>$postData['username'],'sex'=>$postData['sex'],'email'=>$postData['email'],'update_time'=>time()];
		 
		if(isset($postData['id'])==false || is_null($postData['id']) || $postData['id']<1){	
			$data['create_time']=time();
			$userid=Db::name('teacher')->insertGetId($data); 
		}else if(isset($postData['id'])){
			$userid=Db::name('teacher')->where('id',$postData['id'])->update($data);  
		} 
		if($userid){
			$this->success('保存成功！',url('index')); 
		}else{
			$this->error('保存失败！',url('add')); 
		} 
	}
	public function edit(){
		$id = Request::instance()->param('id/d');
		$info=Db::name('teacher')->where('id',$id)->find();
		$this->assign('info',$info);
		return $this->fetch(); 
	}
	public function del(){ 
		$id=Request::instance()->param('id/d'); 
		if (is_null($id) || 0 === $id) {
            return $this->error('未获取到ID信息！',url('index'));
        }else{
			$isset=Db::name('teacher')->where('id',$id)->count();
			if (is_null($isset) || 0 === $isset) {
				return $this->error('非法操作！',url('index'));
			}else{
				$result=Db::name('teacher')->delete($id);
				if($result){
					return $this->success('删除成功！',url('index'));
				}else{
					return $this->error('删除失败！',url('index'));
				}
			} 
		}  
	}
}
