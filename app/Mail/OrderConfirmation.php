<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: "Confirmación de tu Orden #{$this->order->order_number}",
            tags: ['order-confirmation', "order-{$this->order->id}"],
            metadata: [
                'order_id' => $this->order->id,
                'order_total' => $this->order->total,
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.orders.confirmation',
            with: [
                'orderNumber' => $this->order->order_number,
                'orderDate' => $this->order->created_at->format('d/m/Y'),
                'total' => $this->order->total,
                'items' => $this->order->items,
                'shippingAddress' => $this->order->shipping_address,
                'paymentMethod' => $this->order->payment_method,
                'estimatedDelivery' => $this->order->estimated_delivery_date,
                'orderId' => $this->order->id,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
