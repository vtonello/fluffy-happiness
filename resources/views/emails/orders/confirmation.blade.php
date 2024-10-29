<x-mail::message>
    <x-slot:header>
        <h1>¡Gracias por tu compra!</h1>
        <p>Tu orden #{{ $orderNumber }} ha sido confirmada</p>
    </x-slot:header>

    <x-mail::panel>
        <h2>Detalles de la Orden</h2>
        <strong>Fecha de la orden:</strong> {{ $orderDate }}<br>
        <strong>Número de orden:</strong> {{ $orderNumber }}<br>
        <strong>Método de pago:</strong> {{ $paymentMethod }}<br>
        <strong>Entrega estimada:</strong> {{ $estimatedDelivery }}
    </x-mail::panel>

    <x-mail::table>
        | Producto | Cantidad | Precio | Subtotal |
        |:---------|:---------|:--------|:---------|
        @foreach($items as $item)
            | {{ $item->product->name }} | {{ $item->quantity }} | ${{ number_format($item->price, 2) }} | ${{ number_format($item->quantity * $item->price, 2) }} |
        @endforeach
        | **Total** | | | **${{ number_format($total, 2) }}** |
    </x-mail::table>

    <x-mail::panel>
        <h3>Dirección de Envío</h3>
        {{ $shippingAddress }}
    </x-mail::panel>

    <x-mail::button :url="route('orders.show', $orderId)" color="primary">
        Ver Detalles de la Orden
    </x-mail::button>

    Gracias,<br>
    {{ config('app.name') }}

    <x-slot:footer>
        © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
    </x-slot:footer>
</x-mail::message>
