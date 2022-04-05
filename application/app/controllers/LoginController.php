<?php
//use Phalcon\Mvc\Controller;
//session_start();
declare(strict_types=1);

use foo\bar\biz\User;

class LoginController extends ControllerBase
{

    public function indexAction()
    {

    }
    public function authAction(){
        $email = $_POST['email1'];
        $pass = $_POST['pass1'];
        $users = Users::findFirstByemail($email);
        if($users){
          if($users->password=="$pass"){
            if($users->status=="Approved"){
            if($users->role=="Admin"){
                $this->session->set("userrole",'Admin');
                $this->session->set('username',$users->name);
                $this->session->set('userid',$users->id);
                $this->response->redirect('index');
              
            }
            elseif($users->role=="User"){
                $this->session->set("userrole",'User');
                $this->session->set('username',$users->name);
                $this->session->set('userid',$users->id);
                $this->response->redirect('index');
                    
            }
        }
            else {
                return "You Are Restricted";
            }
        }
        else {
            return "Wrong Password";
        }

        }
        else{
            return "WrongEmail";
        }
    }
    public function logoutAction(){
        $this->session->destroy();
        $this->response->redirect('../login');
    }
}
