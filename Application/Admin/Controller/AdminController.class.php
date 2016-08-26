<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController { 
    /**
     * 读取管理员
     */
    public function index(){
    	$arr=M('admin')->order('regtime DESC')->select();
        //var_dump($arr);
        $this->assign('listArr',$arr);// 模板变量赋值.赋值数据集
        $this->display();
    }
    /**
     * 添加管理员
     */
    public function addadmin(){
        // 判断提交方式 做不同处理
        if (IS_POST) {
            // 实例化admin对象
            $admin = D('admin');
            $data['username']= $_POST['username'];
            $data['password']= md5($_POST['password']);
            $data['email']= $_POST['email'];
            $data['regtime']= time();
            
            // 自动验证 创建数据集
            if (!$data = $admin->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                exit($admin->getError());
            }

            //插入数据库
            if ($id = M('admin')->add($data)) {
                $this->success('添加成功', U('Admin/index'), 2);
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }

}