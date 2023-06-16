<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function check_if_user_columns_is_correct(): void
    {
        $user = new User();

        $expected = [
            'name',
            'email',
            'password'
        ];

        $arrayCompare = array_diff($expected, $user->getFillable());//mount a new array with diff

//        dd($arrayCompare);
        $this->assertCount(0, $arrayCompare);//if diff = 0, test OK
    }
}
