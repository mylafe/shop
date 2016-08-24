<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    /**
     * 管理员登录
     */
    public function login(){
    	header("Content-type:text/html;charset=utf-8");
   	//判断提交方式
   		if (IS_POST) {
   			$adminlogin = M('admin');

   			$data['username'] = $_POST['username'];
   			$data['password'] = md5($_POST['password']);
        //验证码检测
        $verify = $_POST['verify'];
        if(check_verify($verify) === false){
            $this->error('验证码错误');
        }

        //如果勾选了自动登录，则将用户名和ip写入cookie中
        if (isset($_POST['auto'])) {
            $ip=  get_client_ip();
            $value=$username."|".$ip;
            //加密
            $value=encryption($value);
            setcookie('auto',$value,C('AUTO_LOGIN_TIME'),'/');
        }

        //查询判断用户名密码是否一致
	   		$where['username'] = $data['username'];
	   		$res = $adminlogin->where($where)->field('password')->find();
   		}

   		if($res && $res['password'] == $data['password']){

        @setcookie('auto',$auto,C('AUTO_TIME_LOGIN'),'/');
        //存储session值
   			session('username', $data['username']);
   			//var_dump(session('username'));
   			$this->success('登录成功，正在跳转至系统首页', U('/Admin'));

   		}else{
   			$this->error('登录失败,用户名或密码不正确!');
   		}

      //获取当前基本信息存入数据库
      // $data=array(
      //   'id'=>$user['id'],
      //   'loginip'=>get_client_ip(),
      //   'logintime'=>time(),
      // );
      // M('admin')->data($data)->save;

    }

    /**
     * 管理员安全退出
     */
    public function logout(){
    	header("Content-type:text/html;charset=utf-8");
      @setcookie('auto','',time()-1,'/');
    	session_unset();
    	session_destroy();
      redirect(U('login/index'));
    	//redirect(U('login/index'), 2, '<h1 style="text-align:center; font-size: 50px; font-weight: normal; margin-top: 120px;">ヾ(￣▽￣)Bye~Bye~<br>正在安全退出</h1>');
    }

    /**
     * 验证码生成
     */
    public function verify_c(){
      $Verify = new \Think\Verify();
      $Verify->fontSize = 18;
      $Verify->length = 4;
      $Verify->userNoise = false;
      $Verify->codeSet = '0123456789';
      $Verify->imageW = 130;
      $Verify->imageH = 50;

      $Verify->entry();
    }


}