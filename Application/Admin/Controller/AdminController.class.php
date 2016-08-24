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
        
    	$this->display();
    }

}