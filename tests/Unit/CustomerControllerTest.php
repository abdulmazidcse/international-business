<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\CustomerController; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CustomerControllerTest extends TestCase
{
    public function test_customer_screen_can_be_rendered(): void
    {
        $controller = new CustomerController();
        $response = $controller->index();  

        // Assert that the response is not null
        $this->assertNotNull($response); 
    }
    public function test_store_method_creates_customer(): void
    {

        $request = new Request([
            'name' => 'Test Customer',
            'phone_number' => '1234567890',
            'terms_and_conditions' => 'accepted',
            'payment_terms' => 'Net 30',
            'country_id' => 1,
            'mode_of_carrying' => 1,
            'port_discharge' => 1,
            'final_destination' => '1',
            'loading_place' => 1,
        ]);

        // Create an instance of the controller
        $controller = new CustomerController();

        // // Call the store method with the fake request
        $response = $controller->store($request);  

        $this->assertNotNull($response);   
    }

    public function test_store_method_creates_customer_and_redirects(): void
    {
        // Prepare request data
        $requestData = [
            'name' => 'Test Customer',
            'phone_number' => '1234567890',
            'terms_and_conditions' => 'accepted',
            'payment_terms' => 'Net 30',
            'country_id' => 1,
            'mode_of_carrying' => 1,
            'port_discharge' => 1,
            'final_destination' => '1',
            'loading_place' => 1,
        ];

        // Create a mock request object
        $request = new Request($requestData);

        // Create an instance of the controller
        $controller = new CustomerController();

        // Call the store method with the mock request
        $response = $controller->store($request);

        // Assert that the response is a redirect response
        $this->assertInstanceOf(RedirectResponse::class, $response);

        // Assert that the response redirects to the expected location (e.g., the customer index page)
        $this->assertEquals(route('customer.index'), $response->getTargetUrl());
    }

     
    // public function testStatus() : void 
    // {
    //     $request = new Request([
    //         'name' => 'Test Customer',
    //         'phone_number' => '1234567890',
    //         'terms_and_conditions' => 'accepted',
    //         'payment_terms' => 'Net 30',
    //         'country_id' => 1,
    //         'mode_of_carrying' => 1,
    //         'port_discharge' => 1,
    //         'final_destination' => 1,
    //         'loading_place' => 1,
    //     ]);
    //     $controller = new CustomerController();
    //     $response = $controller->store($request); 
    //     $response->assertStatus(302); // Assuming a redirect after successful creation 
    // }
}
