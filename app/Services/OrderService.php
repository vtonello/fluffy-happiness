<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Jobs\SendOrderConfirmationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService
{
    public function createOrder(array $data): Order
    {
        return DB::transaction(function () use ($data) {
            $order = Order::create([
                'order_number' => 'ORD-' . Str::random(10),
                'customer_id' => $data['customer_id'],
                'shipping_address_id' => $data['shipping_address_id'],
                'billing_address_id' => $data['billing_address_id'],
                'subtotal' => 0,
                'tax' => 0,
                'shipping_cost' => 10.00, // Simplified shipping cost
                'total' => 0,
                'status' => 'pending',
            ]);

            $subtotal = 0;

            foreach ($data['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);
                $itemSubtotal = $product->price * $item['quantity'];

                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                    'subtotal' => $itemSubtotal,
                ]);

                $subtotal += $itemSubtotal;
            }

            $tax = $subtotal * 0.21; // Simplified tax calculation (21%)
            $total = $subtotal + $tax + $order->shipping_cost;

            $order->update([
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
            ]);

            SendOrderConfirmationEmail::dispatch($order);

            return $order;
        });
    }
}
