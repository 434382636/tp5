<?php
namespace app\index\model;
use think\Model; 
use think\Db; 
class User extends Model{
	static function encryptPassword($password){ 
		if(!empty($password)){
			return sha1(md5($password) . 'mylgl');
		}else{
			return false;
		}
	} 
	static public function isLogin(){
        $uid = session('uid');
        if (isset($uid)){
            return true;
        } else {
            return false;
        }
    } 
	static public function login($username,$password){
		if($username&&$password){
			$info=Db::name('teacher')->where('username',$username)->field('password,id')->find();  
			if(empty($info['id'])){
				return ['type'=>1,'msg'=>'无此用户！'];
			}else{ 
				$npassword=User::encryptPassword($password); 
				if($npassword===$info['password']){
					session('uid',$info['id']);
					return ['type'=>2];
				}else{
					return ['type'=>1,'msg'=>'密码错误！'];
				}
			}
			 
		}else{
			return ['type'=>1,'msg'=>'请完整输入用户名和密码！'];
		}
	}
	static public function logOut(){
        session('uid',null);
        return true;
    }
}
?>