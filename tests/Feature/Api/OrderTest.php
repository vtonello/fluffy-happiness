<?php

namespace Tests\Feature\Api;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_order(): void
    {


        $customer = Customer::factory()->create();
        $shippingAddress = Address::factory()->create([
            'customer_id' => $customer->id,
            'is_shipping' => true
        ]);
        $billingAddress = Address::factory()->create([
            'customer_id' => $customer->id,
            'is_billing' => true
        ]);
        $product = Product::factory()->create(['price' => 100]);

        $response = $this->postJson('/api/v1/orders', [
            'customer_id' => $customer->id,
            'shipping_address_id' => $shippingAddress->id,
            'billing_address_id' => $billingAddress->id,
            'items' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 2
                ]
            ]
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'id',
                    'order_number',
                    'customer_id',
                    'shipping_address_id',
                    'billing_address_id',
                    'subtotal',
                    'tax',
                    'shipping_cost',
                    'total',
                    'status',
                    'items' => [
                        '*' => [
                            'id',
                            'product_id',
                            'quantity',
                            'unit_price',
                            'subtotal'
                        ]
                    ]
                ]
            ]);
    }
}
