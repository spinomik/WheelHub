<?php

declare(strict_types=1);

namespace WheelHubApi\Controller;

use Exception;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use WheelHubApi\Model\User\UserTable;
use WheelHubApi\Model\User\User;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
use stdClass;

class LoginController extends AbstractActionController
{
    // TODO: po rejestracji dodac hashowanie haseł
    // TODO: password_hash($plainPassword, PASSWORD_BCRYPT); 
    // TODO: password_verify($plainPassword, $hashedPassword)
    // FIXME: przenieść klucz do .env!
    // FIXME: przenieść generowanie i weryfikacje tokenu, hashowania i sprawdzanie danych uzytkowanika do authService

    private $table;
    private $key = "4e75589ba6a23e0aab722a95604e72e86e2a7bf1f78d89851080253649138d97";
    protected $request;


    public function __construct(UserTable $table)
    {
        $this->table = $table;
        $this->request = $this->getRequest();
    }

    public function loginAction(): JsonModel
    {
        $data = json_decode($this->request->getContent(), true);

        if (empty($data['username']) || empty($data['password']))
            return new JsonModel([
                'status'   => 'error',
                'code'     => 400,
                'access'   => false,
                'message'  => 'Login or password not provided',
                'data'     => null,
            ]);

        $username = $data['username'];
        $password = $data['password'];
        $user = $this->table->getUser($username, 'username');

        if (empty($user))
            return new JsonModel([
                'status'   => 'error',
                'code'     => 404,
                'access'   => false,
                'message'  => 'Username not found',
                'data'     => null,
            ]);

        if (! $user->getActive() || ! $user->getVerified()) {
            return new JsonModel([
                'status'   => 'error',
                'code'     => 401,
                'access'   => false,
                'message'  => 'User is Blocked',
                'data'     => null,
            ]);
        }

        if (
            password_verify($password, $user->getPassword())
            && $user->getActive() && $user->getVerified()
        ) {
            return new JsonModel([
                'status'   => 'success',
                'code'     => 200,
                'access'   => true,
                'message'  => 'User found successfully',
                'data'     => [
                    "username" => $user->getUsername(),
                    "firstName" => $user->getFirstName(),
                    "lastName" => $user->getLastName(),
                    "token" => $this->generateToken($user),
                    "userRole" => 1 //Tymczasowo przypisywanie roli admina
                ],
            ]);
        } else {
            return new JsonModel([
                'status'   => 'error',
                'code'     => 401,
                'access'   => false,
                'message'  => 'Bad Password',
                'data'     => null,
            ]);
        }
    }

    private function generateToken(User $user): string
    {
        $payload = [
            'iss' => "http://wheelhub.api.localhost",
            'aud' => "http://wheelhub.localhost",
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + (60 * 60 * 3),
            'data' => [
                'userId' => $user->getId(),
                'username' => $user->getUsername()
            ]
        ];

        return JWT::encode($payload, $this->key, 'HS256');
    }

    public function verifyToken(string $token): ?stdClass
    {
        try {
            JWT::$leeway = 60;
            return JWT::decode($token, new Key($this->key, 'HS256'));
        } catch (Exception $e) {
            return null;
        }
    }
}
