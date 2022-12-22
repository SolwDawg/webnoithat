<?php

    namespace App\Http\Livewire\Frontend\Checkout;

    use App\Models\Order;
    use App\Models\Product;
    use Illuminate\Support\Facades\Mail;
    use Livewire\Component;

    class CheckoutProduct extends Component
    {
        public $product, $totalProductAmount;
        public $fullname, $email, $phone, $pincode, $address, $payment_mode = null, $payment_id = null;

//        public function rules(): array
//        {
//            return [
//                'fullname' => 'required|string|max: 255',
//                'email' => 'required|email|max: 255',
//                'phone' => 'required|string|max: 11|min: 10',
//                'pincode' => 'required|string|max: 6|min: 6',
//                'address' => 'required|string|max: 500',
//            ];
//        }

//        public function placeOrder()
//        {
//            $this->validate();
//            $order = Order::create([
//                'user_id' => auth()->user()->id,
//                'tracking_no' => '#'.Str::random(10),
//                'fullname' => $this->fullname,
//                'email' => $this->email,
//                'phone' => $this->phone,
//                'pincode' => $this->pincode,
//                'address' => $this->address,
//                'status_message' => 'in progress',
//                'payment_mode' => $this->payment_mode,
//                'payment_id' => $this->payment_id,
//            ]);
//
//            return $order;
//        }

//        public function codOrder()
//        {
//            $this->payment_mode = 'Cash on delivery';
//            $codOrder = $this->placeOrder();
//            if ($codOrder) {
//
//                try {
//                    $order = Order::findOrFail($codOrder->id);
//                    Mail::to("$order->email")->send(new PlaceOrderMailable($order));
//                } catch (\Exception $e) {
//
//                }
//
//                session()->flash('message', 'Order Placed Successfully');
//                $this->dispatchBrowserEvent('message', [
//                    'text' => 'Order Placed Successfully',
//                    'type' => 'success',
//                    'status' => 200
//                ]);
//
//                return redirect()->to('thank-you');
//            } else {
//                $this->dispatchBrowserEvent('message', [
//                    'text' => 'Something went wrong',
//                    'type' => 'error',
//                    'status' => 500
//                ]);
//            }
//        }

//        public function totalProductAmount(): float|int
//        {
//            $this->totalProductAmount = 0;
//            $this->product = Product::get();
//            $this->totalProductAmount = $this->product->selling_price;
//
//            return $this->totalProductAmount;
//        }

        public function render()
        {
            $this->fullname = auth()->user()->name;
            $this->email = auth()->user()->email;

            $this->phone = auth()->user()->phone;
            $this->pincode = auth()->user()->pincode;
            $this->address = auth()->user()->address;


            return view('livewire.frontend.checkout.checkout-product');
        }
    }
