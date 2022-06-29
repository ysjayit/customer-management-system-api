<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Customer;

class CustomerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }

    public function testCreateCustomer() {

        $dataCustomer = [
            'first_name' => 'Peter',
            'last_name'  => 'Parker',
            'age'        => 26,
            'dob'        => '1996/05/04',
            'email'      => 'peter.parker@gmail.com'
        ];

        $data = [
            'success' => true,
            'data'    => $dataCustomer,
            'message' => 'Customer created successfully.'
        ];

        $this->post(route('customers.store'), $data)->assertStatus(201)->assertJson($data);

    }


}
