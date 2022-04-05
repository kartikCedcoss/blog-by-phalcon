<?php
//use Phalcon\Mvc\Controller;
declare(strict_types=1);

class SignupController extends ControllerBase
{

    public function indexAction()
    {
      
    }
    public function registerAction()
    {
      $user = new Users();
      
      //return $this->request->getPost('pass');
      //assign value from the form to $user
      $user->assign([
          'name'=>$this->request->getPost('name'),
          'email'=>$this->request->getPost('email'),
          'password'=>$this->request->getPost('password'),
          'role'=>'User',
          'status'=>'Restricted',
        
      ]);

      // Store and check for errors
      $success = $user->save();

      // passing the result to the view
      $this->view->success = $success;

      if ($success) {
          $message = "Thanks for registering!";
      } else {
          $message = "Sorry, the following problems were generated:<br>"
                   . implode('<br>', $user->getMessages());
      }

      // passing a message to the view
      $this->view->message = $message;
  }
    
    
}
