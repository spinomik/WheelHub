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

    public function __construct(UserTable $table)
    {
        $this->table = $table;
    }

    public function loginAction(): JsonModel
    {
        $post = json_decode($this->getRequest()->getContent(), true);
        $postLogin = $post['username'] ?? null;
        $postPassword = $post['password'] ?? null;
        $user = $this->table->getUser($postLogin, 'username');

        $status = match (true) {
            !$postLogin || !$postPassword => $this->createErrorResponse(400, 'Login or password not provided'),
            !$user || $postPassword !== $user->password => $this->createErrorResponse(401, 'Invalid login or password'),
            !$user->active => $this->createErrorResponse(403, 'User blocked or account inactive'),
            default => null,
        };

        if ($status !== null) {
            return $status;
        }

        $this->table->updateUser(
            [
                'last_login' => (new \DateTime())->format('Y-m-d H:i:s')
            ],
            "id = '$user->id'"
        );
        if (!empty($user)) {
            return new JsonModel([
                'status'   => 'success',
                'code'     => 200,
                'access'   => true,
                'message'  => 'User logged in successfully',
                'token'    => $this->generateToken($user),
                'user'    => $user->username,
            ]);
        }
    }

    private function createErrorResponse(int $code, string $message): JsonModel
    {
        return new JsonModel([
            'status'  => 'error',
            'code'    => $code,
            'access'  => false,
            'message' => $message,
        ]);
    }

    public function generateToken(User $user): string
    {
        $payload = [
            'iss' => "http://wheelhub.api.localhost",
            'aud' => "http://wheelhub.localhost",
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + (60 * 60 * 3),
            'data' => [
                'userId' => $user->id,
                'username' => $user->username
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
