<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Services\UserService;

final class UserServiceTest extends TestCase
{

    private static object $userService;
    private static $user;

    public static function setUpBeforeClass(): void
    {
        static::$userService = new UserService();
        static::$user = json_decode(file_get_contents(__DIR__ . '/../../tests/fixtures/user.json'), true);
    }

    protected function setUp(): void
    {
    }

    protected function tearDown(): void
    {
    }

    public function testShouldSaveUserValidDataGiven()
    {
        $userInfo = static::$userService->save(['firstName' => 'John', 'lastName' => 'Doe', 'email' => 'jhon@example.com']);
        $this->assertIsArray($userInfo);
        $this->assertArrayHasKey('id', $userInfo);
        $this->assertTrue(!empty($userInfo));
    }
}
