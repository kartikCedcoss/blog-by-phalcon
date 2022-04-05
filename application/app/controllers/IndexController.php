<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->blogs = Blogs::find(
            ["status = 'Approved'",
             'order' => 'blogid DESC'
              ]);
    }

}

