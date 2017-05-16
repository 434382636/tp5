<?php
namespace app\index\controller; 
use think\Controller;  
use think\Loader ;  
use app\index\model\User;
class LoginController extends Controller 
{
    public function index() { 
		return $this->fetch('index');
    }
	public function login(){  
		$data = [
			'username'=>input('post.username'),
			'password'=>input('post.password')
		]; 
		
		$validate = Loader::validate('Teacher'); 
		if(!$validate->check($data)){  
			$this->error($validate->getError(),url('index/login')); 
		}  
		if($data['username']&&$data['password']){
			$result=User::login($data['username'],$data['password']); 
			if($result['type']=='2'){
				return $this->success('登陆成功！',url('index/index'));
			}else{
				$this->error($result['msg'],url('index/login'));
			}
		}else{
			$this->error('请完整输入用户名和密码！',url('index/login'));
		} 
	}
	public function logout(){
		User::logout();
		return $this->success('退出成功！',url('login/index'));
	}
}