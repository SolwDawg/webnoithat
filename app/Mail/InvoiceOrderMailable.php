<?php

    namespace App\Mail;

    use Faker\Provider\Address;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class InvoiceOrderMailable extends Mailable
    {
        use Queueable, SerializesModels;

        public $order;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($order)
        {
            $this->order = $order;
        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope()
        {
            return new Envelope(
                from: 'sondt.21it@vku.udn.vn',
                subject: 'Invoice Order',
                tags: ['shipment'],
                metadata: [
                    'order_id' => $this->order->id,
                ],
            );
        }

        /**
         * Get the message content definition.
         *
         * @return \Illuminate\Mail\Mailables\Content
         */
        public function content()
        {
            return new Content(
                view: 'admin.invoice.generate-invoice',
            );
        }

        /**
         * Get the attachments for the message.
         *
         * @return array
         */
        public function attachments()
        {
            return [];
        }
    }
