<?php
//use Phalcon\Mvc\Controller;
declare(strict_types=1);

use foo\bar\biz\User;

class BlogController extends ControllerBase
{

    public function indexAction()
    {
       
        
    }
    public function newblogAction(){
        
    }
    public function postblogAction(){
        $userid = $this->session->get('userid');
        $username = $this->session->get('username');
        $blogs = new Blogs();
        $blogs->assign([
           'userid'=> $userid,
           'username'=>$username,
           'title'=>$this->request->getPost('title'),
           'details'=>$this->request->getPost('details'),
           'status'=>'Approved',
        
      ]);

      // Store and check for errors
      $success = $blogs->save();
      if($success){
          header("location:../index");
        
      }

    }
    public function readblogAction(){
        $blogid = $_POST['readblog'];
        $this->view->blogs = Blogs::find("blogid = $blogid");
        
    }
}