<?php

declare(strict_types=1);

namespace WheelHubApi\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;

class RegisterController extends AbstractActionController
{
    public function registerAction(): JsonModel
    {
        $login = $this->params()->fromPost('login', null);
        $firstName = $this->params()->fromPost('firstName', null);
        $lastName = $this->params()->fromPost('lastName', null);
        $email = $this->params()->fromPost('email', null);
        $password = $this->params()->fromPost('password', null);

        // if ('bad connection to db')
        //     return new JsonModel([
        //         'status' => 'error',
        //         'code' => 500,
        //         'access' => false,
        //         'message' => 'database connection error'
        //     ]);

        return new JsonModel([
            'status'   => 'success',
            'message'  => 'User register',
            'login'    => $login,
        ]);
    }
}
