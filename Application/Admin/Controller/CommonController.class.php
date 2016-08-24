<?php
namespace Admin\Controller;
use Think\Controller;
/**
 *验证用户是否登录以及用户权限
 */
class CommonController extends Controller {
    public function _initialize(){
    	header("Content-type: text/html; charset=utf-8");

    	//如果$_COOKIE['auto']存在，并且用户不在登录状态
        if(isset($_COOKIE['auto']) && !$_SESSION['uid']){
            $value= explode('|',encryption($_COOKIE['auto'],1));
            //查看ip是否一致
            if($value[1]=  get_client_ip()){
                $m=M('admin');
                $where=array('username'=>$value[0]);
                //检查用户名
                if($id=$m->where($where)->getField('id')){
                    $_SESSION['uid']=$id;
                }
            }
        }

    	//判断用户是否登录
     	if(!isset($_SESSION['username'])) {

     		redirect(U('login/index'));
     		//redirect(U('login/index'), 3, '<h1 style="text-align:center; font-size: 50px; font-weight: normal; margin-top: 120px;"><(￣3￣)><br>对不起,您还没有登录,正跳转至登录面</h1>');
     	}
    }
}