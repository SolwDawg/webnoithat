<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Mail\InvoiceOrderMailable;
    use App\Models\Order;
    use Carbon\Carbon;
    use Exception;
    use Illuminate\Http\Request;
    use Barryvdh\DomPDF\Facade\Pdf;
    use Illuminate\Support\Facades\Mail;
    use Yajra\DataTables\DataTables;

    class adminOrderController extends Controller
    {
        public function index()
        {
            return view('admin.orders.index');
        }

        public function getOrder(Request $request)
        {
            if ($request->ajax()) {
                $data = Order::latest()->get();

                return DataTables::of($data)
                    ->addColumn('action', function ($object) {
                        $link = route("admin.order.show", $object);
                        return "<a href='$link' class='btn btn-primary'>View</a>";
                    })
                    ->editColumn('created_at', function ($object) {
                        return $object->created_at->format('d/m/Y');
                    })
                    ->rawColumns(['action'])->make(true);
            }
        }

        public function show(int $orderId)
        {
            $order = Order::where('id', $orderId)->first();
            if ($order) {

                return view('admin.orders.view', compact('order'));
            } else {

                return redirect()->back()->with('message', 'Order not found');
            }
        }

        public function updateOrderStatus(int $orderId, Request $request)
        {
            $order = Order::where('id', $orderId)->first();
            if ($order) {

                $order->update([
                    'status_message' => $request->order_status,
                ]);
                return redirect()->back()->with('message', 'Order status updated');
            } else {

                return redirect()->back()->with('message', 'Order not found');
            }
        }

        public function viewInvoice(int $orderId)
        {
            $order = Order::findOrFail($orderId);
            return view('admin.invoice.generate-invoice', compact('order'));
        }

        public function generateInvoice(int $orderId)
        {
            $order = Order::findOrFail($orderId);

            $data = ['order' => $order];
            $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
            $todayDate = Carbon::now()->format('d-m-Y');
            return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
        }

        public function mailInvoice(int $orderId)
        {

            $order = Order::findOrFail($orderId);
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('admin/order/'.$orderId)->with('message',
                'Invoice Mail has been sent to '.$order->email);

        }
    }
