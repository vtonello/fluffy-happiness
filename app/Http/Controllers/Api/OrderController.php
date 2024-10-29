<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderService $orderService
    )
    {
    }

    public function store(CreateOrderRequest $request): JsonResponse
    {
        $order = $this->orderService->createOrder($request->validated());

        return response()->json([
            'message' => 'Order created successfully',
            'data' => $order->load(['items.product', 'customer', 'shippingAddress', 'billingAddress'])
        ], 201);
    }

    public function show(Order $order): JsonResponse
    {
        $cacheKey = "order_{$order->id}";

        $orderData = Cache::remember($cacheKey, now()->addHours(24), function () use ($order) {
            return $order->load(['items.product', 'customer', 'shippingAddress', 'billingAddress']);
        });

        return response()->json([
            'data' => $orderData
        ]);
    }
}
