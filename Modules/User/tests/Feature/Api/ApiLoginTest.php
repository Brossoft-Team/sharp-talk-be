<?php

namespace Modules\User\tests\Feature\Api;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ApiLoginTest extends TestCase
{
    use DatabaseTransactions;

    public function test_login_with_empty_credential(): void
    {
        $response = $this
            ->post('/api/auth/login',["email" => "","password" => ""]);

        $response->assertStatus(422)->assertJsonValidationErrors(["email","password"],"message");
    }

    //TODO: create login with correct credentials, register & api profile tests
}
