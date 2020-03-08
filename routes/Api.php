<?php
require '../vendor/autoload.php';
use App\Controllers\UserController;

class Api
{
    public $router;
    public $userController;

    public function __construct()
    {
        $this->router = new Buki\Router();
        $this->userController = new UserController();
    }
    
    public function run()
    {
        $this->router->get('/', function () {
            return 'Application running...';
        });
        
        $this->router->post('/user', function () {
            $this->userController->create();
        });
        
        $this->router->get('/user', function () {
            $this->userController->findAll();
        });

        $this->router->get('/user/:id', function ($id) {
            $this->userController->findByID($id);
        });

        $this->router->put('/user/:id', function ($id) {
            $this->userController->edit($id);
        });

        $this->router->delete('/user/:id', function ($id) {
            $this->userController->remove($id);
        });

        $this->router->run();
    }
}
