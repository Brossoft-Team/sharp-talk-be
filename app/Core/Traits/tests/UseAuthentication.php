<?php

namespace App\Core\Traits\tests;

use Modules\User\App\Models\User;

trait UseAuthentication{

    protected function getUser() : User {
        return User::factory()->create();
    }

}
