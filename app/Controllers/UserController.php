<?php
namespace App\Controllers;

header('Access-Control-Allow-Origin: *');

use App\Models\User;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel =  new User();
    }

    public function checkIfUserExists($id)
    {
        try {
            $exist = $this->userModel->findByID($id);
            if ($exist) {
                return true;
            } else {
                http_response_code(404);
                echo json_encode(false);
                exit;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    public function verifyResponse($response)
    {
        if ($response) {
            http_response_code(302);
        } else {
            http_response_code(404);
        }
    }

    public function create()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        try {
            $response = $this->userModel->create($data);
            http_response_code(201);
            echo json_encode($response);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            $response = $this->userModel->findAll();
            http_response_code(200);
            echo json_encode($response);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function findByID($id)
    {
        try {
            $response = $this->userModel->findByID($id);
            $this->verifyResponse($response);
            echo json_encode($response);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        try {
            $response = $this->userModel->edit($id, $data);
            http_response_code(200);
            echo json_encode($response);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function remove($id)
    {
        try {
            $this->checkIfUserExists($id);
            $response = $this->userModel->remove($id);
            http_response_code(200);
            echo json_encode($response);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
}
